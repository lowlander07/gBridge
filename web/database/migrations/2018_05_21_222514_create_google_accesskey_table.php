<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoogleAccesskeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		/*
        Schema::create('google_accesskey', function (Blueprint $table) {
            $table->increments('accesskey_id');
            $table->string('password', 16)->nullable(false);
            $table->boolean('password_used')->nullable(false)->default(false);
            $table->timestamp('generated_at')->nullable(false)->useCurrent();
            $table->timestamp('used_at')->nullable(true);
            $table->string('google_key', 128)->nullable(false;
            $table->unsignedInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('user_id')->on('user');
        });
		*/
        Schema::create('google_accesskey', function (Blueprint $table) {
            $table->increments('accesskey_id');

			$table->string('password', 16)->nullable(false);
            $table->boolean('password_used')->nullable(false)->default(false);
            $table->timestamp('used_at')->nullable(true);
			
            $table->unsignedInteger('user_id')->nullable(false)->unique();
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->string('auth_code', 128)->nullable(false);
            $table->string('redirect_uri');
            $table->string('refresh_token')->nullable();
            $table->string('google_key')->nullable();
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
        Schema::dropIfExists('google_accesskey');
    }
}
