<?php

namespace App\Http\Controllers;
use App\Models\Banword;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function filterBadWord($filter) {

        $words = Banword::select('word')->get()->pluck('word')->toArray();

        return str_replace($words,'*****',$filter);
        
    }

}
