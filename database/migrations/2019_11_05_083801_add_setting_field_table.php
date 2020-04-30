<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('facebook')->default('facebook.com');
            $table->string('twitter')->default('twitter.com');
            $table->string('google')->default('google.com');
            $table->string('instagram')->default('instagram.com');
            $table->string('disqus');
            $table->text('gmaps');
            $table->text('about_us')->default('Describe Website');
            $table->string('logo');
            $table->string('nav_logo');
            $table->string('title_images');
            $table->text('meta_description');
            $table->string('meta_keywords');
            $table->text('google_analystic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
