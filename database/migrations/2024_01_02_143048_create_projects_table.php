<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buid')->unique();
            $table->bigInteger('userid')->unique(); //OWNER == BUSINESS UNIT
            // $table->bigInteger('devid'); //DEVELOPER
            // $table->bigInteger('sysid')->unique(); //SYSTEM DEVELOPMENT INFORMATION
            // $table->string('owner');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration')->nullable();
            // $table->string('status')->default(0); //[0]AHEAD OF SCHEDULE, [1]ON SCHEDULE, [2]DELAYED OR [3]COMPLETED
            $table->string('status')->nullable(); //[0]AHEAD OF SCHEDULE, [1]ON SCHEDULE, [2]DELAYED OR [3]COMPLETED
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
