<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserloginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlogins', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->dateTime('login_time')->nullable();
            $table->dateTime('logout_time')->nullable();
            $table->softDeletes('is_deleted');
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
        Schema::dropIfExists('userlogins');
    }
}
