<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('entry')->nullable();
            $table->string('occasion')->nullable();
            $table->string('location')->nullable();
            $table->string('month')->nullable();
            $table->year('year')->nullable();
            $table->string('image')->nullable();
            $table->string('emoji')->nullable();
            $table->string('playlist_id')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
