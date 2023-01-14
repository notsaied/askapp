<?php

namespace App\Http\Controllers\Api\Ads;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Requests\Ads\AdsRequestRequest;
use Auth;

class AdsController extends Controller
{

    public function index(Request $request)
    {
        $data = Ad::where([
            ['status',1]
        ]);

        if ($request->sort == 'random') {
            $result = $data->limit(10)->inRandomOrder()->get();
        }else{
            $result = $data->orderBy('id','DESC')->simplePaginate(10);
        }

        return $result;

    }



}
