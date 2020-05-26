<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewsHasCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('news_has_category', function (Blueprint $table) {
			 $table->id();
			 $table->unsignedBigInteger('category_id');
			 $table->unsignedBigInteger('news_id');

			 $table->foreign('category_id')->references('id')
				 ->on('categories');
			$table->foreign('news_id')->references('id')
				->on('news');

			$table->index(['category_id', 'news_id']);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
