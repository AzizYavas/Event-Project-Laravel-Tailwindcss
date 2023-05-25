<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alluser', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->nullable(false);
            $table->string('surname',50)->nullable(false);
            $table->string('email',50)->nullable(false);
            $table->string('password',250)->nullable(false);
            $table->text('profile_image')->nullable(false);
            $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alluser');
    }
};
