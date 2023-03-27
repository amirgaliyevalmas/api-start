<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('title_kz');
            $table->string('title_ru');
            $table->softDeletes();

            $table->timestamps();

            $table->bigInteger('department_id')->nullable()->unsigned();
            $table->index('department_id','department_idx_area')->nullable();

            $table->foreign('department_id', 'department_id_fk_area')->constrained()
                ->on('departments')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
