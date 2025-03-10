<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("empleados", function (Blueprint $table) {
            $table->id();
            $table->foreignId("oficina_id")->constrained()->onDelete("cascade"); // Relación con oficinas
            $table->string("nombre")->nullable(false); // Obligatorio
            $table->string("primer_apellido")->nullable(false); // Obligatorio
            $table->string("segundo_apellido")->nullable();
            $table->string("rol")->nullable();
            $table->date("fecha_nacimiento")->nullable();
            $table->string("dni")->unique()->nullable(false); // Obligatorio y único
            $table->string("email")->unique()->nullable(false); // Obligatorio y único
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("empleados");
    }
};
