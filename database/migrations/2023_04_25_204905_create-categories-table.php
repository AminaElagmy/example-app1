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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table-> string ('name',50)->unique();
            $table-> string ('slug')->uniqe();
            $table-> unsignedBigInteger ('parent_id')->nullable();
            $table->timestamps();
            $table->text('discription')->nullable();
            $table->string('art-path')->nullable();

            $table-> foreign ('parent_id')->references('id')->on('categories')
               ->nullOnDelete();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
