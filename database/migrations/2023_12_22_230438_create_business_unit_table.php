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
        Schema::create('business_unit', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid')->unique(); //BU01-CCI,BU02-COE,BU03-COBA,BU04-COGS
            $table->string('request')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_unit');
    }
};
