<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugReportApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bug_report_applications', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();

            $table->bigIncrements('id');
            $table->softDeletes();
            $table->timestamps();
            $table->string('reported_by')->nullable();
            $table->string('email')->nullable();;
            $table->unsignedBigInteger('section');
            $table->unsignedBigInteger('sub_section');
            $table->unsignedBigInteger('category');
            $table->string('attachment')->nullable();
            $table->string('user_comment')->nullable();
            $table->timestamp('report_submitted_at')->nullable();
            $table->string('admin1_comment')->nullable();
            $table->timestamp('admin1_commented_at')->nullable();
            $table->string('admin2_comment')->nullable();
            $table->timestamp('admin2_commented_at')->nullable();
            $table->unsignedBigInteger('unit_assign');
            $table->timestamp('published_at')->nullable();
            $table->string('unit_comment')->nullable();
            $table->timestamp('unit_commented_at')->nullable();
            $table->unsignedBigInteger('status');
            //$table->foreign('reported_by')->references('id')->on('portal_users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('section')->references('id')->on('bug_report_application_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sub_section')->references('id')->on('bug_report_application_sub_sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category')->references('id')->on('bug_report_application_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status')->references('id')->on('bug_report_application_statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_assign')->references('id')->on('bug_report_application_unit_assigns')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bug_report_applications');
    }
}
