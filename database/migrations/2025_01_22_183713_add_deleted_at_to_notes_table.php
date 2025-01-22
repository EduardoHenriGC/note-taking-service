<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();  // Adiciona a coluna deleted_at
        });
    }
    
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn('deleted_at');  // Remove a coluna caso a migração seja revertida
        });
    }
};
