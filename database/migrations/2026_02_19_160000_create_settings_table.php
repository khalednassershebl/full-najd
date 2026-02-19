<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Settings stored as key-value per group (tab). Groups: logos, navbar, footer, contacts, services_form, seo.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('group', 64)->comment('Tab: logos, navbar, footer, contacts, services_form, seo');
            $table->string('key', 128);
            $table->text('value')->nullable();
            $table->string('type', 32)->default('string')->comment('string, text, json, image, boolean');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['group', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
