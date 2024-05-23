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
        Schema::create('member_tags', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('member_id')->constrained(table: 'members', column: 'id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_tags');
    }
};
