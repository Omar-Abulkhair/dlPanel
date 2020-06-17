<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->json('tag')->nullable();
            $table->boolean('is_checked')->default(0);
            $table->boolean('favourite')->default(0);
            $table->integer('priority')->default(1);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function(Blueprint $table)
        {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['parent_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('parent_id');
        });
        Schema::dropIfExists('todos');

    }
}
