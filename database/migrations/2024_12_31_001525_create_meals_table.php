<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('calories');
            $table->float('carbs')->nullable();
            $table->float('proteins')->nullable();
            $table->float('fats')->nullable();
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner', 'snack', 'brunch']);
            $table->date('meal_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
