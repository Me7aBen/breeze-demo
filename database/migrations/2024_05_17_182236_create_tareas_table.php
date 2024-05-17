<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration {
    public function up() {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->boolean('completed')->default(false);
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('tareas');
    }
}