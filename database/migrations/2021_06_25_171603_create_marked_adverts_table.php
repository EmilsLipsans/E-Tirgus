<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkedAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marked_adverts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('users_id')->constrained()->nullable()
                ->onDelete('cascade');
            $table->foreignId('adverts_id')->constrained()->nullable()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marked_adverts');
    }
}
