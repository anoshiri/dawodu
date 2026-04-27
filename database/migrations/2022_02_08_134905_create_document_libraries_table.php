<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_libraries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('source')->nullable();
            $table->date('publication_date')->nullable()->useCurrent();
            
            $table->text('content')->nullable();

            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();

            $table->unsignedTinyInteger('sort')->default(100)->nullable();
            $table->string('sites')->nullable();
            $table->string('tags')->nullable();
            $table->string('original_file_name')->nullable();
            $table->text('documents')->nullable();
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
        Schema::dropIfExists('document_libraries');
    }
}
