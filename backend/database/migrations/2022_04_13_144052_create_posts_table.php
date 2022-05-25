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
        Schema::create('posts', function (Blueprint $table) {
            // $table->foreignId('id_categorie')->constrained("categorie")->nullable();
            $table->id()->autoIncrement();
            $table->String("sjt_post");
            $table->integer("upvote")->default(0)->nullable();;
            // $table->String('reff_util');

            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');;
            $table->foreignId('utilisateur_id')->constrained()->onDelete('cascade');;
            $table->integer("downvote")->default(0)->nullable();;
            $table->date("date_post")->nullable();;


            // $table->foreign('reff_util')->references('reff_uti')->on('posts');
            // $table->foreignId("reff_uti")->constrained();

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
        Schema::dropIfExists('posts');
    }
};
