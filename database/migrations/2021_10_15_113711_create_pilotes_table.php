<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilotes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('civility');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('birthdate');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('driving_licence', 2048);
            $table->enum('licence_status', ['send','valide', 'invalide']);
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
        Schema::dropIfExists('pilotes');
    }
}
