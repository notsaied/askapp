<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Question;
use App\Models\Report;
use App\Models\Ad;

class HomeController extends Controller
{
    public function index(){

        $lastUsers = User::limit(4)
                        ->orderBy('id','DESC')
                        ->get();

        $lastQuestions = Question::limit(4)
                        ->orderBy('id','DESC')
                        ->with([
                            'user' => function($q){ $q->select(['id','name']); }
                        ])
                        ->withCount('comments')
                        ->get();

        $lastReports = Report::limit(4)
                        ->orderBy('id','DESC')
                        ->with([
                            'user' => function($q){ $q->select(['id','name']); }
                        ])
                        ->get();


        $totals = [
            'users' => User::count(),
            'questions' => Question::count(),
            'comments' => Comment::count(),
            'reports' => Report::count(),
            'ads' => Ad::count()
        ];

        return view('dashboard.home.index',compact('totals','lastUsers','lastQuestions','lastReports'));

    }

}
