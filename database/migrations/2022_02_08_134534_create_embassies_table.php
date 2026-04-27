<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbassiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embassies', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('address');
            $table->string('locality')->nullable();
            $table->string('city');
            $table->string('code')->nullable();
            $table->string('state')->nullable();
            $table->string('country');

            $table->text('comment')->nullable();
            $table->string('url')->nullable();

            $table->foreignId('user_id')->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->unsignedTinyInteger('sort')->default(100)->nullable();
            $table->string('tags')->nullable();
            
            $table->string('image')->nullable();
            
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
        Schema::dropIfExists('embassies');
    }
}
