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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('emergency_name')->after('linkedin')->nullable();
            $table->string('relation_user')->after('emergency_name')->nullable();
            $table->string('contact_info')->after('relation_user')->nullable();
            $table->string('conditions')->after('contact_info')->nullable();
            $table->string('allergies')->after('conditions')->nullable();
            $table->string('blood')->after('allergies')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
          $table->dropColumn('emergency_name');
          $table->dropColumn('relation_user');
          $table->dropColumn('contact_info');
          $table->dropColumn('conditions');
          $table->dropColumn('allergies');
          $table->dropColumn('blood');
        });
    }
};
