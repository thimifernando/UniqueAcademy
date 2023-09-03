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
        Schema::create('tutorial', function (Blueprint $table) {
            $table->id('t_id');
            $table->string('t_des');
            $table->foreignId('c_id');
            $table->string('due_date');
            $table->foreignId('s_id');
            $table->foreignId('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
