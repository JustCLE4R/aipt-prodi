<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropColumn('shareable');
            $table->enum('status', ['private', 'share', 'borrow'])->default('private');
            $table->unsignedBigInteger('borrow_from')->nullable();
            $table->foreign('borrow_from')->references('id')->on('dokumens')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropForeign(['borrow_from']);
            $table->dropColumn('borrow_from');
            $table->dropColumn('status');
            $table->boolean('shareable')->default(0);
        });
    }
};
