<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCedulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cedulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barangay_resident_id')->comment = 'Reference on barangay_residents table as Complainant';
            $table->string('cedula_number')->nullable();
            $table->string('or_number')->nullable();
            $table->longText('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('date_issued')->nullable();
            $table->string('issued_at')->nullable();
            $table->string('taxable_amount')->nullable();
            $table->string('community_tax_due')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('total_amount_paid')->nullable();
            $table->tinyInteger('status')->nullable()->default(3)->comment = '1-To Received, 2-Processing, 3-Pending, 4-Disapproved';
            $table->string('ticket_datetime')->nullable();
            $table->string('ticket_number')->nullable();
            $table->unsignedBigInteger('issuance_configuration_id')->nullable();

           // Defaults
            $table->tinyInteger('is_deleted')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('last_updated_by')->references('id')->on('users');
            $table->foreign('barangay_resident_id')->references('id')->on('barangay_residents');
            $table->foreign('issuance_configuration_id')->references('id')->on('issuance_configurations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cedulas');
    }
}
