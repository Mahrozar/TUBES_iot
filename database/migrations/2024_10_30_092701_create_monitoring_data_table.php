<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('monitoring_data', function (Blueprint $table) {
            $table->id();
            $table->string('device_id');
            $table->string('parameter');
            $table->float('value');
            $table->timestamps();
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('monitoring_data');
    }
};
