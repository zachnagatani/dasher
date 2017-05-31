<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamp('opened_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('closed_at')->nullable();
            $table->string('handling_employee')->default('Zach');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
