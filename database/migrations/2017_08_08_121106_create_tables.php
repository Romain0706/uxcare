<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug');
            $table->boolean('is_active');
            $table->boolean('is_delete');
            $table->timestamps();
        });

        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();

            $table->foreign('service_id')->references('id')->on('services')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->boolean('is_active');
            $table->boolean('is_delete');
            $table->timestamps();
        });

        Schema::create('dates', function (Blueprint $table) {
            $table->increments('id');

            $table->date('begin');
            $table->date('end');
            $table->timestamps();
        });

        Schema::create('campaign_date', function (Blueprint $table) {
            $table->integer('campaign_id')->unsigned();
            $table->integer('date_id')->unsigned();

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('date_id')->references('id')->on('dates')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['campaign_id', 'date_id']);
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->timestamps();
        });

        Schema::create('campaign_customer', function (Blueprint $table) {
            $table->integer('campaign_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['campaign_id', 'customer_id']);
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('slug');
            $table->boolean('is_active');
            $table->boolean('is_delete');
            $table->timestamps();
        });

        Schema::create('campaign_project', function (Blueprint $table) {
            $table->integer('campaign_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['campaign_id', 'project_id']);
        });

        Schema::create('customer_project', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['customer_id', 'project_id']);
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('contact_project', function (Blueprint $table) {
            $table->integer('contact_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->foreign('contact_id')->references('id')->on('contacts')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['contact_id', 'project_id']);
        });

        Schema::create('attrakdiffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('length');
            $table->string('support');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('campaigns');
        Schema::dropIfExists('dates');
        Schema::dropIfExists('campaign_date');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('campaign_customer');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('campaign_project');
        Schema::dropIfExists('customer_project');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contact_project');
        Schema::dropIfExists('attrakdiffs');
    }
}
