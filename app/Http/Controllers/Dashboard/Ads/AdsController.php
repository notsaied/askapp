<?php

namespace App\Http\Controllers\Dashboard\Ads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Ads\StoreAdRequest;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index (Request $request) {

        if($request->sort == 'active'){

            $q = Ad::where([
                ['status',1],
                ['expired_at', '<=', \Carbon\Carbon::now()]
            ]);

        }elseif($request->sort == 'finish') {

            $q = Ad::where('status',3);

         }elseif($request->sort == 'new'){
            $q = Ad::where('status',0);
        }else{
            $q = new Ad();
        }

        $ads = $q->orderBy('id','DESC')->paginate(15);

        return view('dashboard.ads.index',compact('ads'));

    }

    public function remove(Request $request) {

        $validated = $request->validate([
            'id' => 'required|exists:ads'
        ]);

        $question = Ad::find($request->id)->delete();

        return true;

    }

    public function edit ($id) {

        $ad = Ad::findOrFail($id);

        return view('dashboard.ads.edit',compact('ad'));
    }


    public function addAd() {
        return view('dashboard.ads.add');
    }

    public function store(StoreAdRequest $request) {

        $data = $request->validated();

        if (isset($data['image'])) {

            $name = $request->file('image')->getClientOriginalName();

           $path = $request->file('image')->store('public/images/ads');

            $data['image'] = $path;

        }

        $data['started_at'] = \Carbon\Carbon::parse($data['started_at']);
        $data['expired_at'] = \Carbon\Carbon::parse($data['expired_at']);

        Ad::create($data);

        return redirect()->back()->with('success','Ad Add Successfully !');

    }

}
