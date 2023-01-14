<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Resources\HomeResource;

class HomeController extends Controller
{

    public function index()
    {
        $data = Question::withCount('comments')->orderBy('id','DESC')->simplePaginate(15);

        return $data;

    }

    public function search(Request $request) {

        $validate = $request->validate([
            'q' => 'required'
        ]);

        $data = Question::withCount('comments')
                ->where('description','LIKE','%'.$validate['q'].'%')
                ->simplePaginate(15);

        return $data;
    }

}
