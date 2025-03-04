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
        Schema::create('companyprofile', function (Blueprint $table) {
            $table->id();
            $table->text('logo_type');
            $table->text('logo_mark');
            $table->string('name');
            $table->string('email');
            $table->text('address');
            $table->text('history');
            $table->text('simple_history');
            $table->text('instagram');
            $table->text('facebook');
            $table->text('youtube');
            $table->text('whatsapp');
            $table->string('phone');
            $table->text('map');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
