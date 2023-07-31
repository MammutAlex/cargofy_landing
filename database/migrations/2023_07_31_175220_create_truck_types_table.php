<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('truck_types', function (Blueprint $table) {
            $table->id();
            $table->string('region_id');
            $table->json('name');
            $table->string('capacity');
            $table->json('capacity_unit');
            $table->string('volume');
            $table->json('volume_unit');
            $table->string('price_per_unit_length');
            $table->json('currency');
            $table->json('distance_unit');
            $table->string('price_per_month');
            $table->string('example');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('truck_types');
    }
};
