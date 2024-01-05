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
        Schema::create('project_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('userid')->on('users');
            $table->foreignId('pro_id')->references('proid')->on('projects');

            // $table->foreignId("proid")->constrained('projects');
            // $table->foreignId("userid")->constrained('users');

            // $table->foreignId("project_id")->constrained('projects');
            // $table->foreignId("user_id")->constrained('users');

            // $table->foreignId("project_proid")->constrained('projects');
            // $table->foreignId("user_userid")->constrained('users');
            $table->boolean('is_lead')->default(false); // Indicates if the user is a lead developer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user');
    }
};
