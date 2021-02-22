<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStafAhliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Up the migration
        // Add another table who have the interview time
        if (!Schema::hasTable('jadwalInterview')) {
            Schema::create('jadwalInterview', function (Blueprint $t) {
                $t->id();
                $t->string('tanggal');
                $t->string('jam');
                $t->unsignedSmallInteger('stock')->default(10);
                $t->timestamps();
            });
        }

        // Main table for staffRegistration
        if (!Schema::hasTable('stafAhliRegistration')) {
            Schema::create('stafAhliRegistration', function (Blueprint $t) {
                $t->id();
                $t->string('name');
                $t->string('nim');
                $t->string('id_line');
                $t->string('no_wa');
                $t->string('komitmen');
                $t->timestamps();
            });
        }

        // Add table for store the option of jadwal
        if (!Schema::hasTable('applicantInterviewTime')) {
            Schema::create('applicantInterviewTime', function (Blueprint $t) {
                $t->id();
                $t->foreignId('staff_id')
                    ->constrained('stafAhliRegistration')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $t->foreignId('jadwal_id')
                    ->constrained('jadwalInterview')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $t->timestamps();
            });
        }
        // Add another table to store the option
        if (!Schema::hasTable('applicantOption')) {
            Schema::create('applicantOption', function (Blueprint $t) {
                $t->id();
                $t->foreignId('staff_id')
                    ->constrained('stafAhliRegistration')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $t->string('option');
                $t->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Down the  migration
        Schema::dropIfExists('applicantOption');
        Schema::dropIfExists('applicantInterviewTime');
        Schema::dropIfExists('stafAhliRegistration');
        Schema::dropIfExists('jadwalInterview');
    }
}
