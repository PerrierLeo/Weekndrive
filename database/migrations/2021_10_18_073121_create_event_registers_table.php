<?php

use App\Models\Car;
use App\Models\Companion;
use App\Models\Event;
use App\Models\Pilote;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Event::class);
            $table->integer('car_id');
            $table->integer('user_id');
            $table->string('second_pilote')->nullable();
            $table->string('third_pilote')->nullable();
            $table->string('first_companion')->nullable();
            $table->string('second_companion')->nullable();
            $table->string('total_companion_price');
            $table->string('total_pilote_price');
            $table->string('total_price_ht');
            $table->enum('status', ['send', 'valide', 'invalide'])->default('send');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_registers');
    }
}
