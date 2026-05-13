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
        Schema::create('tbl_branches', function (Blueprint $table) {
            $table->string('branch_code');
            $table->string('subofbranch');
            $table->boolean('main_branch')->nullable()->comment('Primary Organization');
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('slogan')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('system_id');
            $table->string('comment')->nullable();
            $table->boolean('active')->nullable();
            $table->string('inputter',250)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->primary(['subofbranch', 'branch_code']);
            $table->foreign('system_id')->references('id')->on('tbl_systems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_branches');
    }
};
