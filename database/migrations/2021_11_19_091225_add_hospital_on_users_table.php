<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHospitalOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('role',function($table){
                $table->string('hospital_name')->nullable()->unique();
                $table->string('head')->nullable();
                $table->string('logo')->nullable();
                $table->string('website')->nullable();
                $table->string('linkedin')->nullable();
                $table->string('twitter')->nullable();
                $table->string('instagram')->nullable();
                $table->string('facebook')->nullable();              
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_hospital_id_foreign');
        });
    }
}
