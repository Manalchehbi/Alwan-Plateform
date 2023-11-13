<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->default(null);   
            $table->string('last_name');
            $table->string('first_name');
            $table->String('adresse');
            $table->string('email');
            $table->string('picture');
            $table->string('phone');
            $table->string('gender'); 
            $table->foreignId('speciality_id')->constrained('specialities')->onDelete('cascade');   
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');   
           
            
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
        Schema::dropIfExists('teachers');
    }
}
