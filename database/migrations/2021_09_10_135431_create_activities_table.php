<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('activities', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignId('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreignId('category_id');
                $table->foreign('category_id')->references('id')->on('categories');
                $table->datetime('horario');
                $table->integer('qtd_jogadores');
                $table->text('observacao')->nullable();
                $table->timestamps();
                $table->softDeletes($column = 'deleted_at', $precision = 0);
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
