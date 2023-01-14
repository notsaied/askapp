<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportsController extends Controller
{

    public function index (Request $request) {

        if($request->sort == 'users'){

            $q = Report::where('type','user');

        }elseif($request->sort == 'questions') {

            $q = Report::where('type','question');

         }elseif($request->sort == 'comments'){
            $q = Report::where('type','comment');
        }else{
            $q = new Report();
        }


        $reports = $q->with([
                'user' => function ($q) {
                    $q->select(['id','name']);
                }
            ])->orderBy('id','DESC')
                        ->paginate(15);

        return view('dashboard.reports.index',compact('reports'));

    }

    public function remove (Request $request) {

        $validated = $request->validate([
            'id' => 'required|exists:reports'
        ]);

        $report = Report::find($request->id)->delete();

        return true;
    }

}
