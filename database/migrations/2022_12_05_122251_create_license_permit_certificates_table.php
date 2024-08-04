<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensePermitCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_permit_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barangay_resident_id')->comment = 'Reference on barangay_residents table as Resident';
            $table->longText('purpose')->nullable();
            $table->string('or_number')->nullable();
            $table->string('business_name')->nullable();
            $table->string('location')->nullable(); 
            $table->string('nature_of_business')->nullable();
            $table->string('community_tax_cert')->nullable();
            $table->string('gross_sales_income')->nullable();
            $table->string('amount_collected')->nullable();
            $table->dateTime('issued_on')->nullable();
            $table->string('issued_at')->nullable();
            $table->string('registration_number')->nullable();
            $table->longText('remarks')->nullable();
            $table->tinyInteger('status')->nullable()->default(3)->comment = '1-Approved, 2-Processing, 3-Pending, 4-Disapproved';
            
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
        Schema::dropIfExists('license_permit_certificates');
    }
}
