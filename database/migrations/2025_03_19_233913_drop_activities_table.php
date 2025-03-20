<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropActivitiesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('activities');
    }

    public function down()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }
}