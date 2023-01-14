<?php

namespace App\Http\Controllers\Dashboard\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Questions\EditQuestionRequest;
use App\Models\Question;

class QuestionsController extends Controller
{

    public function index(Request $request) {

        if(!empty($request->q)){
            $q = Question::select(['id','description','updated_at','created_at'])
                ->where('description', 'LIKE', '%'.$request->q.'%');
        }else{
            $q = Question::select(['id','description','updated_at','created_at']);
        }

        $questions = $q->with(['user'=> function ($q){ $q->select(['id','name']); } ])
                               ->withCount('comments')
                               ->orderBy('id','DESC')
                               ->paginate(15);
                               
        return view('dashboard.questions.index',compact('questions'));
    }

    public function remove(Request $request) {

        $validated = $request->validate([
            'id' => 'required|exists:questions'
        ]);

        $question = Question::find($request->id)->delete();

        return true;

    }

    public function edit($id) {
        $question = Question::findOrFail($id);
        return view('dashboard.questions.edit',compact('question'));
    }

    public function update(EditQuestionRequest $request) {

        $data = $request->validated();

        $q = Question::find($data['id'])->update($data);

        return redirect()->back()->withSuccess('Question updated successfully !');

    }


}
