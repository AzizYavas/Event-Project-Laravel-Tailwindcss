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
        Schema::create('etkinkler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_category',50)->nullable();
            $table->string('event_title',65)->nullable();
            $table->string('event_adress',65)->nullable();
            $table->string('event_start',65);
            $table->string('event_end',65);
            $table->text('event_text');
            $table->text('event_imageBase64');
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
        Schema::dropIfExists('etkinkler');
    }
};
