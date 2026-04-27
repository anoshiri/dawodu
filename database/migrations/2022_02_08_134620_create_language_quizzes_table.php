<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('language_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('language', 50)->nullable()->default('Edo');
            $table->string('tags')->nullable();
            $table->tinyInteger('total_time')->nullable()->default(45);
            $table->bigInteger('number_of_test')->nullable()->default(0);
            $table->bigInteger('total_score')->nullable()->default(0);
            $table->unsignedTinyInteger('sort')->nullable()->default(100);
            $table->unsignedTinyInteger('status')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('language_quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->mediumText('options');
            $table->unsignedBigInteger('language_quiz_id')->default(0);
            $table->unsignedTinyInteger('sort')->nullable()->default(100);
            $table->unsignedTinyInteger('status')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('language_quiz_questions');
        Schema::dropIfExists('language_quizzes');
    }
}
