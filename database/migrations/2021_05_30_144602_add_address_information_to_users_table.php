<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressInformationToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('email', function ($table) {
                $table->string('phone', 40)->nullable();
                $table->string('postcode', 12)->nullable();
                $table->foreignId('country_id')->nullable()->constrained()->nullOnDelete();
                $table->string('town', 50)->nullable();
                $table->string('city', 50)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropColumn(['phone', 'postcode', 'town', 'city', 'country_id']);
        });
    }
}
