<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ci');
          $table->string('photo');
          $table->integer('dni');
          $table->integer('dni_type');
          $table->string('first_name');
          $table->string('last_name');
          $table->string('gender',1);
          $table->date('date_born');
          $table->integer('telephone');
          $table->string('blood_type');
          $table->text('address');
          $table->integer('contact');
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
        Schema::dropIfExists('employees');
    }
}
