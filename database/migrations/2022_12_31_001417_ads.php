<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ads',function (Blueprint $table){
            $table->id();
            $table->bigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('image')->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('started_at');
            $table->timestamp('expired_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
