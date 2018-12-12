<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesRatesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('services_rates', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('service_id');
      $table->foreign('service_id')->references('id')->on('services');
      $table->string('name');
      $table->decimal('price', 8, 2);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('rates_items');
  }
}
