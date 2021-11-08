<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('email')->nullable();
            $table->text('email_2')->nullable();
            $table->text('tel_no')->nullable();
            $table->text('tel_no_2')->nullable();
            $table->text('mobile_no')->nullable();
            $table->text('mobile_no_2')->nullable();
            $table->text('fax')->nullable();
            $table->text('address')->nullable();
            $table->text('address_2')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('skype')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('youtube')->nullable();
            $table->string('footer_title')->nullable();
            $table->text('footer_content')->nullable();
            $table->text('header_image')->nullable();
            $table->text('footer_image')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
}
