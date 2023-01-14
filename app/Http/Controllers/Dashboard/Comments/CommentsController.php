<?php

namespace App\Http\Controllers\Dashboard\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index() {
        $comments = Comment::with([
            'user' => function ($q) { $q->select(['id','name']); }
        ])
                            ->orderBy('id','DESC')
                            ->paginate(15);

        return view('dashboard.comments.index',compact('comments'));

    }

    public function question_comnents($id) {

        $comments = Comment::where('question_id',$id)
                            ->with([
                                    'user' => function ($q) { $q->select(['id','name']); }
                                ])
                            ->orderBy('id','DESC')
                            ->paginate(15);

        return view('dashboard.comments.index',compact('comments'));

    }


    public function remove(Request $request) {

        $validated = $request->validate([
            'id' => 'required|exists:comments'
        ]);

        $comment = Comment::find($request->id)->delete();

        return true;

    }

}
