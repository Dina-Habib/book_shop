<?php

use App\Models\Author;
use App\Models\Classification;
use App\Models\Publisher;
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
            $table->string('name',45)->nullable(false);
            $table->string('isbn',45)->nullable(false);

            $table->foreignIdFor(Author::class,'author_id');
            $table->foreign('author_id')->on('authors')->references('id')->restrictOnDelete();

            $table->foreignIdFor(Publisher::class);
            $table->foreign('publisher_id')->on('publishers')->references('id')->restrictOnDelete();

            $table->foreignIdFor(Classification::class);
            $table->foreign('classification_id')->on('classifications')->references('id')->restrictOnDelete();

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
}
