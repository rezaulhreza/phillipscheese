<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheeses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cheese_type_id')->nullable();
            $table->string('name');
            $table->string('description');
            $table->string('weight');
            $table->string('price');
            $table->string('stock');
            $table->foreign('cheese_type_id')
            ->references('id')
            ->on('cheese_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('cheeses');
    }
}
