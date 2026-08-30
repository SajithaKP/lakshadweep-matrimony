<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {


    //   $table->string('house_name')->nullable(); add this in 'family_details'

        schema::table('family_details', function (Blueprint $table) {
            $table->string('house_name')->nullable()->after('family_location');
        });
        /*
        |--------------------------------------------------------------------------
        | PROFILES
        |--------------------------------------------------------------------------
        */
        Schema::table('profiles', function (Blueprint $table) {

            $table->string('weight')->nullable()->after('height');

            $table->unsignedInteger('children')->nullable()
                ->after('marital_status');

            $table->text('languages_spoken')->nullable();

        });


        /*
        |--------------------------------------------------------------------------
        | EDUCATION DETAILS
        |--------------------------------------------------------------------------
        */
        Schema::table('education_details', function (Blueprint $table) {

            $table->string('tenth_school')->nullable();
            $table->string('tenth_percentage')->nullable();

            $table->string('plus_two_stream')->nullable();
            $table->string('plus_two_school')->nullable();
            $table->string('plus_two_percentage')->nullable();

            $table->json('additional_education')->nullable();

        });


        /*
        |--------------------------------------------------------------------------
        | RELIGIOUS DETAILS
        |--------------------------------------------------------------------------
        */
       Schema::table('religious_details', function (Blueprint $table) {

            $table->string('religious_division')->nullable();

            $table->string('quran_reading')->nullable();

            $table->string('hijab')->nullable();

            $table->string('prayer')->nullable();

            $table->text('religious_values')->nullable();

        });


        /*
        |--------------------------------------------------------------------------
        | LIFESTYLE DETAILS
        |--------------------------------------------------------------------------
        */
        Schema::table('lifestyle_details', function (Blueprint $table) {


            $table->text('interests')->nullable();

        });


        /*
        |--------------------------------------------------------------------------
        | PARTNER PREFERENCES
        |--------------------------------------------------------------------------
        */
        Schema::table('partner_preferences', function (Blueprint $table) {

            $table->string('language')->nullable();

        });
    }


    public function down(): void
    {
        Schema::table('family_details', function (Blueprint $table) {
            $table->dropColumn('house_name');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'weight',
                'children',
                'languages_spoken'
            ]);
        });

        Schema::table('education_details', function (Blueprint $table) {
            $table->dropColumn([
                'tenth_school',
                'tenth_percentage',
                'plus_two_stream',
                'plus_two_school',
                'plus_two_percentage',
                'additional_education'
            ]);
        });

        Schema::table('religious_details', function (Blueprint $table) {
            $table->dropColumn([
                'religious_background',
                'religious_division',
                'quran_reading',
                'hijab',
                'prayer',
                'religious_values'
            ]);
        });

        Schema::table('lifestyle_details', function (Blueprint $table) {
            $table->dropColumn([
                'hobbies',
                'interests'
            ]);
        });

        Schema::table('partner_preferences', function (Blueprint $table) {
            $table->dropColumn('language');
        });
    }
};