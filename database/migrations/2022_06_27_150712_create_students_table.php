<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->default(null);   
            
            $table->string('last_name');
            $table->string('first_name');
            $table->date('date_naissance');
            $table->string('phone');
            $table->string('email');
            $table->string('avatar');
            $table->string('parentsName')->nullable();
            $table->string('parentsMobileNumber')->nullable();
            $table->string('gender')->nullable();

            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
