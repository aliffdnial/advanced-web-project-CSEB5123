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
            $table->id('proid');
            $table->bigInteger('bunitid');
            $table->bigInteger('userid');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration')->nullable();
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
