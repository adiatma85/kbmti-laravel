<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBodyTextAndLinkInEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add Body Text and link in
        Schema::table('events', function (Blueprint $t) {
            $t->longText('bodyText')->nullable()->after('event_type');
            $t->string('link')->nullable()->after('bodyText');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $t) {
            $t->dropColumn('bodyText');
            $t->dropColumn('link');
        });
    }
}
