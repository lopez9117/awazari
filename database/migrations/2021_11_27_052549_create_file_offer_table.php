<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_offer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained('files')
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
        Schema::dropIfExists('file_offer');
    }
}
