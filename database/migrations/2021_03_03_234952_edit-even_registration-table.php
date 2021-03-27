<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditEvenRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $t) {
           $t->enum('event_type', [ 'OPEN-TENDER', 'NORMAL-EVENT'] )->after('description');
        });
        
        Schema::table('eventRegistration', function (Blueprint $t){
            $t->string('nim')->nullable()->change();
            $t->integer('angkatan')->nullable()->change();
            $t->string('email')->nullable()->change();
            /* New field list */ 
            $t->string('phone')->nullable()->after('email');
            $t->string('line_id')->nullable()->after('phone');
            $t->string('folder')->nullable()->after('line_id');
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
            $t->dropColumn('event_type');
        });

        Schema::table('eventRegistration', function (Blueprint $t) {
            $t->string('nim')->change();
            $t->integer('angkatan')->change();
            /* Drop new column */
            $t->dropColumn('phone');
            $t->dropColumn('line_id');
            $t->dropColumn('folder');
        });
    }
}
