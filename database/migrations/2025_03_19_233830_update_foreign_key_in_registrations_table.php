<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeyInRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign(['event_id']); // Drop the old foreign key
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade'); // Add the new foreign key
        });
    }

    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign(['event_id']); // Drop the new foreign key
            $table->foreign('event_id')->references('id')->on('activities')->onDelete('cascade'); // Revert to the old foreign key
        });
    }
}