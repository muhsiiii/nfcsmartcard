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
        Schema::create('allergy_dropdowns', function (Blueprint $table) {
            $table->id();
            $table->string('allergy');
            $table->string('status')->default(1);
            $table->timestamps();
        });

        DB::table('allergy_dropdowns')->insert([
            'allergy' => 'food'
        ]);

        DB::table('allergy_dropdowns')->insert([
            'allergy' => 'medication'
        ]);

        DB::table('allergy_dropdowns')->insert([
            'allergy' => 'environmental'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergy_dropdowns');
    }
};
