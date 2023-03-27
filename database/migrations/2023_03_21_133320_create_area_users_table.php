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
        Schema::create('area_users', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('area_id')->nullable()->unsigned();

            $table->index('user_id','area_users_user_idx')->nullable();
            $table->index('area_id','area_users_area_idx')->nullable();

            $table->foreign('user_id', 'area_users_user_id_fk')->constrained()
                ->on('users')->references('id')->onDelete('cascade');

            $table->foreign('area_id', 'area_users_area_id_fk')->constrained()
                ->on('areas')->references('id')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_users');
    }
};
