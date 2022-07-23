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
        //
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table ->string('name');
            $table->foreignId("pic_id")->nullable()
                ->references("id")
                ->on("postimages")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("email");
            $table->string("address")->nullable();
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
        //
        Schema::dropIfExists('blogs');
    }
};
