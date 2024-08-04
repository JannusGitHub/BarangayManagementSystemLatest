<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayResidentBlottersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangay_resident_blotters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barangay_resident_id')->comment = 'Reference on barangay_residents table as Complainant';
            $table->string('case_number')->nullable();
            $table->longText('complainant_statement')->nullable();
            $table->string('respondent')->nullable();
            $table->string('respondent_age')->nullable();
            $table->string('respondent_address')->nullable();
            $table->string('respondent_contact_number')->nullable();
            $table->string('person_involved')->nullable();
            $table->string('incident_location')->nullable();
            $table->dateTime('incident_date')->nullable();
            $table->dateTime('reported_date')->nullable();
            $table->tinyInteger('status')->nullable()->comment = '1-New, 2-Ongoing, 3-Report, 4-Solved, 5-Not Solved';
            $table->tinyInteger('action_taken')->nullable()->comment = '1-Negotiating, 2-Both Signed, 3-Others';
            $table->string('remarks')->nullable();
            $table->string('photo')->nullable();
            
           // Defaults
            $table->tinyInteger('is_deleted')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('last_updated_by')->references('id')->on('users');
            $table->foreign('barangay_resident_id')->references('id')->on('barangay_residents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangay_resident_blotters');
    }
}
