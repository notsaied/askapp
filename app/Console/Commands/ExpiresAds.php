<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ad;

class ExpiresAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:ad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update records of ads has been expired';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $ads = Ad::select(['id','status','expired_at','created_at','updated_at'])
          ->where([
            ['status',1],
            ['expire_at', '<=', \Carbon\Carbon::now()]
        ])->get();

        foreach($ads as $ad){

            $ad->status = 3;

            $ad->save();

        }

        $this->info('Successfully Expired Ads Has been updated');

    }
}
