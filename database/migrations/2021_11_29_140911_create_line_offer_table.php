<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_offer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('line_id')->constrained('lines')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreignId('offer_id')->constrained('offers')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('line_offer');
    }
}
