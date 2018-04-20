<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardoffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standardoffers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offertitle');
			$table->string('offerref');
			$table->string('applicableto');
			$table->char('effectivedate');
			$table->char('effectivetime');
			$table->char('enddate');
			$table->char('endtime');
			$table->string('vendors');
			$table->char('transactionamount');
			$table->char('processingfees');
			$table->char('interestrate');
			$table->string('interestmonth');
			$table->string('termscondition');
			$table->string('authorid');
			$table->string('status');
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('standardoffers');
    }
}
