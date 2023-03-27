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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();



            $table->bigInteger('department_id')->nullable()->unsigned();
            $table->index('department_id','department_users_idx')->nullable();

            $table->foreign('department_id', 'department_users_id_fk')->constrained()
                ->on('departments')->references('id')->onDelete('cascade');

            $table->bigInteger('speciality_id')->nullable()->unsigned();
            $table->index('speciality_id','speciality_users_idx')->nullable();

            $table->foreign('speciality_id', 'speciality_users_id_fk')->constrained()
                ->on('specialities')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
