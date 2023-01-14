<?php

namespace App\Http\Controllers\Api\Questions;

use App\Traits\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Questions\CreateQuestionRequest;
use App\Models\Question;
use Auth;
use App\Http\Resources\QuestionResource;

class QuestionsController extends controller
{

    use HttpResponse;

    public function index($id)
    {
        $data = Question::with([
                'user' => function($q){

                     $q->select(['id','name']);

                }, // end of user of the post

                'comments.user' => function($q){

                    $q->select(['id','name'])->orderBy('id','DESC');


                } //end comments data

                ])->find($id);

        if(!isset($data)){
            return $this->error('Post id not found' ,['id'=> $id . ' is not exist'],404);
        }

        return $this->success(new QuestionResource($data),'Data has fetched successfully');

    }

    public function create(CreateQuestionRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
                
        $data['description'] = $this->filterBadWord($data['description']);

        $q = Question::create($data);

        return $this->success(['question_id'=>$q->id],'Question created successfully');

    }

    public function remove(Request $request)
    {
        $data = Question::where([

                ['id' , $request->id ],

                ['user_id' , Auth::id() ]

            ])->delete();

        if($data){

            return $this->success([],'Question deleted successfully');

        }

        return $this->error('you are not allowed to do a action !');

    }

}
