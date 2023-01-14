<?php

namespace App\Http\Controllers\Api\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Reports\ReportRequest;
use Auth;
use App\Models\Report;
use App\Traits\HttpResponse;

class ReportsController extends Controller
{

    use HttpResponse;

    public function create(ReportRequest $request)
    {

        $data = $request->validated();

        if($data['type'] == 'user'){

            $d = \App\Models\User::find($data['element_id']);

        }elseif($data['type'] == 'question'){

            $d = \App\Models\Question::find($data['element_id']);


        }elseif($data['type'] == 'comment'){

            $d = \App\Models\Comment::find($data['element_id']);

        }

        if(!isset($d)){
            return $this->error('The '.$data['type'].' is not exists !');
        }


        $data['user_id'] = Auth::id();

        $d = Report::create($data);

        return $this->success(['report_id' => $d->id],'Report has submited successfully !');

    }
}
