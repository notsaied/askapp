<?php

namespace App\Http\Controllers\Api\Comments;

use App\Traits\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Comments\CreateCommentRequest;
//use App\Models\Question;
use App\Models\Comment;
use Auth;

class CommentsController extends Controller
{
    use HttpResponse;

    public function create(CreateCommentRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        $data['comment'] = $this->filterBadWord($data['comment']);

        $q = Comment::create($data);

        return $this->success(['comment_id' => $q->id],'comment added successfully !');

    }

    public function remove(Request $request)
    {

        $data = Comment::where([
                    ['id' , $request->id ],
                    ['user_id' , Auth::id() ]
                ])->delete();

        if($data){

                return $this->success([],'Comment deleted successfully');

        }

        return $this->error('you are not allowed to do a action !');

    }


    }
