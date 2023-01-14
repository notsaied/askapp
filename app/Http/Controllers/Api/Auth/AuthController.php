<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{

    use HttpResponse;

    public function login(LoginRequest $request)
    {

        $data = $request->validated();

        if( Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]) ){

            $user = Auth::user();

            $success['token'] =  $user->createToken('AuthToken')->plainTextToken;

            $success['name'] = $user->name;

            return $this->success($success,'User Logging In');

        }else{

            return $this->error('Unauthorised',['error'=>['Unauthorised']]);

        }

    }

    public function register(RegisterRequest $request)
    {

        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $success['token'] = $user->createToken('AuthToken')->plainTextToken;

        $success['name'] = $user->name;

        return $this->success($success,'User Registered Successfully');

    }

    public function logout(Request $request)
    {
        Auth::user()->token()->delete();

        return $this->success([],'Logging out successfully');
        
    }

}
