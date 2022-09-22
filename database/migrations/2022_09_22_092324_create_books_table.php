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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("book_name")->default("");
            $table->string("author_name")->default("");
            $table->unsignedBigInteger("author_id");
//            $table->index("author_id", "book_author_idx");
//            $table->foreign("author_id", "book_author_fk")->on("authors",)->references("id");
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
        Schema::dropIfExists('books');
    }
};
