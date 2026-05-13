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
        Schema::create('tbl_systems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->comment('DEV => "Development", TEST => "Testing (beta testing)", REL => "Production Release"');
            $table->boolean('isactive')->nullable();
            $table->string('inputter')->nullable()->comment('fill inputter');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_systems');
    }
};
