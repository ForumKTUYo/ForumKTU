<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForWarningUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warning_user', function (Blueprint $table) {
            $table->foreign('warning_id')->references('id')->on('warnings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warning_user', function (Blueprint $table) {
            $table->dropForeign('warning_user_warning_id_foreign');
            $table->dropForeign('warning_user_user_id_foreign');
        });
    }
}
