<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('orientation',['N','E','S','W']);
            $table->float('angle');
            $table->decimal('area',6,2);
            $table->float('latitude');
            $table->float('longitude');
            $table->unsignedBigInteger('project_id'); // Foreign key column
            $table->unsignedBigInteger('company_id'); // Foreign key column
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');  // Cascade delete if a project is deleted

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');  // Cascade delete if a project is deleted
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
