<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_orders', function (Blueprint $table) {
            $table->id();
            $table->string('mo_series_number');
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            // $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            // $table->foreignId('status_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('media_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('tax_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('agency_fee_id')->constrained()->cascadeOnDelete();
            // $table->string('project')->nullable();
            // $table->date('period_start')->nullable();
            // $table->date('period_end')->nullable();
            // $table->date('prepared')->nullable();
            // $table->text('revision')->nullable();
            // $table->date('date_revision')->nullable();

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
        Schema::dropIfExists('media_orders');
    }
};
