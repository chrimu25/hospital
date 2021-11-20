<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('impairement');
            $table->string('impairement1')->nullable();
            $table->string('impairement2')->nullable();
            $table->string('impairement3')->nullable();
            $table->enum('level', ['Complex', 'High', 'Moderate','Low'])->default('Moderate');
            $table->date('diagnosed_at')->nullable();
            $table->foreignId('diagnosed_on')->constrained('users');
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
        Schema::dropIfExists('diseases');
    }
}
