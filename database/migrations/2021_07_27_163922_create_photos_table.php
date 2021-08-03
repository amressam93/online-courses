<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->integer('photoable_id');     // carry user_id Or course_id In This Project.
            $table->string('photoable_type');   //  carry model name [userModel Or CourseModel].
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
        Schema::dropIfExists('photos');
    }
}
