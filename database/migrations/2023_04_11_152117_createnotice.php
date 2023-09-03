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
        Schema::create('notice', function (Blueprint $table) {
            $table->id('n_id');
            $table->string('teacher_name');
            $table->string('subject');
            $table->date('n_date');
            $table->string('topic');
            $table->string('n_description');
            $table->text('pdf');
            $table->text('img');
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
