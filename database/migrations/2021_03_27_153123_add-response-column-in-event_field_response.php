<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResponseColumnInEventFieldResponse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventFieldResponse', function (Blueprint $t) {
            $t->longText('response')->default("")->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventFieldResponse', function (Blueprint $t) {
            $t->dropColumn('response');
        });
    }
}
