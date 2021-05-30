<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_details', function (Blueprint $table) {
            $table->id();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->text('about')->nullable();
            $table->text('rules')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('accreditation')->nullable();
            $table->text('chairman_message');
            $table->text('achievements')->nullable();
            $table->text('address');
            $table->string('phone1')->nullable();
            $table->string('phone2');
            $table->string('email');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('skype')->nullable();
            $table->string('linkedin')->nullable();
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
        Schema::dropIfExists('school_details');
    }
}
