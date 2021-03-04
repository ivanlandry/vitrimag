<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('titre');
            $table->string('ville');
            $table->text('description');
            $table->integer('prix');
            $table->string('img_1');
            $table->string('img_2');
            $table->string('img_3');
            $table->boolean('publier')->default(false);
            $table->boolean('actif')->default(true);
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
        Schema::dropIfExists('annonces');
    }
}
