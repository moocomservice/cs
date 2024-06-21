<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageUrlsToBlacklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blacklists', function (Blueprint $table) {
            $table->text('image_urls')->nullable()->after('telephone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blacklists', function (Blueprint $table) {
            $table->dropColumn('image_urls');
        });
    }
}
