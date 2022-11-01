<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function GuzzleHttp\json_encode;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->json('main')->after('password')->nullable();
            $table->json('main')->after('password')->nullable();;
            $table->json('month')->after('main')->nullable();
            $table->json('week')->after('month')->nullable();
            $table->json('day')->after('week')->nullable();

            $table->integer('statistic-month')->after('day')->nullable();
            $table->integer('statistic-week')->after('statistic-month')->nullable();
            $table->integer('statistic-day')->after('statistic-week')->nullable();

            $table->timestamp('last_online')->after('statistic-day')->nullable();
            $table->string('current_timezone')->after('last_online')->nullable();
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
            $table->dropColumn('main');
            $table->dropColumn('month');
            $table->dropColumn('week');
            $table->dropColumn('day');

            $table->dropColumn('statistic-month');
            $table->dropColumn('statistic-week');
            $table->dropColumn('statistic-day');

            $table->dropColumn('last_online');
            $table->dropColumn('current_timezone');
        });
    }
};
