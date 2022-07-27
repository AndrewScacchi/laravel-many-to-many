<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_details', function (Blueprint $table) {
            //$table->id();-> can't be used in a one to one dependent tab
            $table->unsignedBigInteger('user_id');
            $table->string('address', 100);
            $table->string('phone', 20);
            $table->date('birth');

            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users');//->onDelete() specify what to do when primary line on tab isdestroyed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_details');
    }
}
