<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('teacher_id');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('discount');
            $table->enum('status', ['comming_soon', 'debuted']);
            $table->boolean('featured')->default(false);
            $table->integer('category_id');
            $table->string('thumbnail');
            $table->longText('description');
            // $table->integer('click');
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
        Schema::dropIfExists('courses');
    }
}
