<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageColumnsToSchoolDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_details', function (Blueprint $table) {
            $table->text('patron_message')->after('chairman_message');
            $table->text('principal_message')->after('chairman_message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_details', function (Blueprint $table) {
            $table->dropColumn('patron_message');
            $table->dropColumn('principal_message');
        });
    }
}
