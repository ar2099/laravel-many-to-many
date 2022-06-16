<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTraduttoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_traduttore', function (Blueprint $table) {
            $table->id();

            $table->unsignedbiginteger('post_id');
            $table->unsignedbiginteger('traduttore_id');

            $table  ->foreign('post_id')
                    ->references('id')
                    ->on('posts')->onDelete("cascade");

            $table  ->foreign('traduttore_id')
                    ->references('id')
                    ->on('traduttores')->onDelete("cascade");
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
        Schema::dropIfExists('post_traduttore');
    }
}
