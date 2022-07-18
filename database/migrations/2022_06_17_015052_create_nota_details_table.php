<?php

use App\Models\Nota;
use App\Models\Product;
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
        Schema::create('nota_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nota_id');
            $table->foreignIdFor(Product::class);
            $table->string('qty');
            $table->timestamps();
            $table->foreign('nota_id')->references('id')->on('notas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_details');
    }
};
