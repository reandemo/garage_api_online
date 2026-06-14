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
        Schema::create('sys_branches', function (Blueprint $table) {

            $table->string('branchcode', 10)->primary();
            $table->string('branch_name', 200);
            $table->string('system_id', 100);
            $table->string('phone', 50)->nullable();
            $table->string('location_code', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('logo', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->string('created_by', 50)->nullable();

            $table->string('updated_by', 50)->nullable();
            $table->string('subofbranch')->nullable();
            $table->boolean('main_branch')->nullable()->comment('Primary Organization');
            $table->string('short_name')->nullable();
            $table->string('comment')->nullable();
            $table->boolean('active')->nullable();
            $table->string('slogan')->nullable();
            $table->string('inputter',250)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
          
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_branches');

            


    }
};
