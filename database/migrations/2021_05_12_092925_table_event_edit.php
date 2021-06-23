<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableEventEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $t) {
            // Remove Body text column
            $t->dropColumn('bodyText');
            // Add label column
            $t->string('label')->after('name');
            // Add Expired date column
            $t->date('expired_date')->after('link')->nullable()->default(NULL);
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
            // Add Body text column
            $t->longText('bodyText')->after('event_type');
            // Remove label
            $t->removeColumn('label');
            // Remove expired date
            $t->removeColumn('expired_date');
        });
    }
}
