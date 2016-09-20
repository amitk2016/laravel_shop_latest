<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
    {
         Schema::create('products', function (Blueprint $table){

             $table->increments('id');
             $table->string('product_title',100);
             $table->text('product_description');
             $table->string('image',100);
             $table->decimal('price',5,2);
             $table->smallInteger('quantity');
             $table->timestamps();

        // Schema::table('products',function($table){

        //     $table->renameColumn('product_id','id');
        // });




         });
           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        Schema::drop('products');   


         // Schema::table('products',function($table){

        //     $table->renameColumn('id','product_id');
        // });


    }
}
