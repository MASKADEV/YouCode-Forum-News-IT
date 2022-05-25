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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id_comment');
            // $table->Integer("user_id")->primary()->autoIncrement();
            $table->String("sjt_comments");
            $table->foreignId('utilisateur_id')->constrained()->onDelete('cascade');;
            $table->foreignId('post_id')->constrained()->onDelete('cascade');;

            // $table->foreignId('post')->constrained();
            // $table->Integer("id_post");

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
        Schema::dropIfExists('comments');
    }
};
