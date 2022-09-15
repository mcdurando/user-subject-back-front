<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subjects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

              // Foreign key

              $table->bigInteger('user_id')->unsigned()->index()->nullable();
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

              $table->bigInteger('subject_id')->unsigned()->index()->nullable();
              $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_subjects', function (Blueprint $table) {
            $table->dropForeign('user_subjects_user_id_foreign');
            $table->dropColumn('user_id');

            $table->dropForeign('user_subjects_subject_id_foreign');
            $table->dropColumn('subject_id');
        });

        Schema::dropIfExists('user_subjects');
    }


};
