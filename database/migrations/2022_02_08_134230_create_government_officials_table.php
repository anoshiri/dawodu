<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernmentOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('government_officials', function (Blueprint $table) {
            $table->id();

            $table->string('salutation')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->string('suffix')->nullable();

            

            $table->date('tenure_start')->nullable();
            $table->date('tenure_end')->nullable();

            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('youtube')->nullable();

            $table->string('position')->nullable();

            $table->text('bio')->nullable();

            $table->unsignedTinyInteger('xtype')->nullable()->default(1);
            $table->unsignedTinyInteger('state_id')->nullable();
            $table->unsignedBigInteger('constituency_id')->nullable();

            $table->string('political_party')->nullable();
            $table->string('url')->nullable();

            $table->foreignId('user_id')->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->unsignedTinyInteger('sort')->default(100)->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);

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
        Schema::dropIfExists('government_officials');
    }
}
