<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constitutions', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            
            $table->longText('content')->nullable();
            
            $table->foreignId('constitution_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();
            
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')->nullable();

            $table->unsignedTinyInteger('sort')->default(100)->nullable();

            $table->boolean('status')->nullable()->default(1);

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
        Schema::dropIfExists('constitutions');
    }
}
