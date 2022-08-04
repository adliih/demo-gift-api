<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsRedeemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts_redeems', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('qty');
            $table->unsignedInteger('gift_id');
            $table->unsignedInteger('user_id');            
            $table->timestamp('created_at'); // first timestamp will has default value to current timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts_redeems');
    }
}
