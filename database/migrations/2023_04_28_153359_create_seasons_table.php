<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Series;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number');
//            $table->unsignedBigInteger('series_id');
//            $table->foreign('series_id')->references('id')->on('series');
//            $table->foreignIdFor(Series::class)->constrained(); - criaria uma coluna serie_id
//            $table->foreignIdFor(Series::class, 'series_id')->constrained(); - criaria uma coluna series_id

            $table->foreignId('series_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('seasons');
    }
};
