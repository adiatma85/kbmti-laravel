<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCredentialColumnInEventRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventRegistration', function (Blueprint $t) {
            $t->dropColumn('name');
            $t->dropColumn('nim');
            $t->dropColumn('angkatan');
            $t->dropColumn('email');
            $t->dropColumn('phone');
            $t->dropColumn('line_id');
            $t->dropColumn('folder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventRegistration', function (Blueprint $t) {
            $t->string('name')->nullable()->after('id');
            $t->string('nim')->nullable()->after('name');
            $t->integer('angkatan')->nullable()->after('nim');
            $t->string('email')->nullable()->after('angkatan');
            $t->string('phone')->nullable()->after('email');
            $t->string('phone')->nullable()->after('email');
            $t->string('line_id')->nullable()->after('phone');
            $t->string('folder')->nullable()->after('line_id');
        });
    }
}
