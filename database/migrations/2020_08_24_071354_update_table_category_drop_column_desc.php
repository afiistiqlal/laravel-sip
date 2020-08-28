<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableCategoryDropColumnDesc extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('category', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}
