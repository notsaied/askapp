<?php

namespace App\Http\Controllers\Dashboard\Words;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banword;

class BadWordsController extends Controller
{
    public function index () {

        $words = Banword::orderBy('id','DESC')->paginate(15);
   
        return view('dashboard.words.index',compact('words'));
   
    }

    public function add(){
        return view('dashboard.words.add');
    }

    public function store(Request $request){
        
        $validate = $request->validate([
            'word' => 'required'
        ]);

        Banword::create($validate);

        return redirect()->back()->withSuccess('Word Added successfully !');

    }

    public function remove(Request $request) {

        $validated = $request->validate([
            'id' => 'required|exists:banwords'
        ]);

        $question = Banword::find($request->id)->delete();

        return true;

    }    

}
