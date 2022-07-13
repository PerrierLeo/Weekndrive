<?php

use App\Models\Car;
use App\Models\User;
use App\Models\Event;
use App\Models\Pilote;
use App\Models\Companion;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiloteRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilote_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Event::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Car::class);
            $table->foreignIdFor(Pilote::class);
            $table->foreignIdFor(Companion::class);
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
        Schema::dropIfExists('pilote_registers');
    }
}
