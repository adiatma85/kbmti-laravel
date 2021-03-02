<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPortofolioFieldInStaffAhliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stafAhliRegistration', function (Blueprint $t) {
            $t->string('portofolio')->after('komitmen')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stafAhliRegistration', function (Blueprint $t) {
            $t->dropColumn('portofolio');
        });
    }
}
