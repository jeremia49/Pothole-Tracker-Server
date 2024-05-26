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
        Schema::create('inference', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid');
            $table->text('url');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('status');
            $table->bigInteger('timestamp');
            $table->string('streetname')->default('-');
            $table->boolean('isVerified')->default(false);
            $table->boolean('isRejected')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inference');
    }
};
