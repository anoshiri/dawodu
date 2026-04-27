<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->date('publication_date')->nullable()->useCurrent();
            $table->string('subject');
            $table->longText('content');
            $table->string('source')->nullable();

            $table->string('video_url')->nullable();
            
            $table->foreignId('category_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('contributor_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();

            $table->foreignId('user_id')->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->string('image')->nullable();

            $table->string('sites')->nullable();
            $table->string('sections')->nullable();
            $table->string('tags')->nullable();
            $table->longText('related')->nullable();

            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('impressions')->default(0);

            $table->boolean('status')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
