<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use App\Traits\HttpResponse;

class Handler extends ExceptionHandler
{

    use HttpResponse;

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
      $this->renderable(function (AuthenticationException $e, $request) {
        if ($request->is('api/*')) {

            return $this->error('Unauthenticated',['auth'=>'please login first'],401);

        }
       });
    }

    public function render($request, Throwable $e)
    {
        // Force to application/json rendering on API calls
        if ($request->is('api*')) {
            // set Accept request header to application/json
            $request->headers->set('Accept', 'application/json');
        }

        // Default to the parent class' implementation of handler
        return parent::render($request, $e);
    }

    protected function invalidJson($request, ValidationException $exception)
    {

        return $this->error('The given data was invalid.',$exception->errors(),$exception->status);

    }


}
