<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_dropdowns', function (Blueprint $table) {
            $table->id();
            $table->string('condition');
            $table->string('status')->default(1);
            $table->timestamps();
        });

        DB::table('medical_dropdowns')->insert([
            'condition' => 'diabetes'
        ]);

        DB::table('medical_dropdowns')->insert([
            'condition' => 'cholesterol'
        ]);

        DB::table('medical_dropdowns')->insert([
            'condition' => 'asthma'
        ]);

        DB::table('medical_dropdowns')->insert([
            'condition' => 'epilepsy'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_dropdowns');
    }
};
