<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthDataTable extends Migration
{
    public function up()
    {
        Schema::create('health_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User reference
            $table->date('date'); // The date for the health data
            $table->integer('steps')->default(0);
            $table->float('calories_burned', 8, 2)->default(0);
            $table->float('heart_rate', 5, 2)->nullable();
            $table->float('kilometers_walked', 8, 2)->default(0);
            $table->float('fat_burning_minutes', 5, 2)->default(0);
            $table->float('bmi', 5, 2)->nullable();
            $table->string('blood_pressure')->nullable();
            $table->integer('stress_level')->nullable();
            $table->float('sleep_hours', 5, 2)->default(0);
            $table->float('blood_glucose', 5, 2)->nullable();
            $table->float('blood_oxygen', 5, 2)->nullable();
            $table->float('water_intake', 5, 2)->nullable();
            $table->float('weight', 8, 2)->nullable();
            $table->timestamps(); // Created at and Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_data');
    }
}
