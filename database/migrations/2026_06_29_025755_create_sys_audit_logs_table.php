<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sys_audit_logs', function (Blueprint $table) {

            $table->bigIncrements('id');

            // Module
            $table->string('module',100);

            // Table Name
            $table->string('table_name',100);

            // Primary Key
            $table->string('record_id',100);

            // Action
            $table->enum('action',[
                'CREATE',
                'UPDATE',
                'DELETE',
                'LOGIN',
                'LOGOUT',
                'UPLOAD',
                'EXPORT',
                'PRINT',
                'APPROVE',
                'REJECT'
            ]);

            // Changed Data
            $table->json('old_data')->nullable();
            $table->json('new_data')->nullable();

            // User
            $table->string('user_login',50)->nullable();

            // Device
            $table->ipAddress('ip_address')->nullable();

            $table->text('user_agent')->nullable();

            // Remarks
            $table->string('remarks',255)->nullable();

            $table->timestamps();

            $table->index('table_name');
            $table->index('record_id');
            $table->index('module');
            $table->index('action');
            $table->index('user_login');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sys_audit_logs');
    }
};