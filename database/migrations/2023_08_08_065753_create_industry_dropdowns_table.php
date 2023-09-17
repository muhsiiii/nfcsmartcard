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
        Schema::create('industry_dropdowns', function (Blueprint $table) {
            $table->id();
            $table->string('industry');
            $table->string('status')->default(1);
            $table->timestamps();
        });

        DB::table('industry_dropdowns')->insert([
            'industry' => 'Technology'
        ]);

        DB::table('industry_dropdowns')->insert([
            'industry' => 'Finance'
        ]);

        DB::table('industry_dropdowns')->insert([
            'industry' => 'Retail'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industry_dropdowns');
    }
};
