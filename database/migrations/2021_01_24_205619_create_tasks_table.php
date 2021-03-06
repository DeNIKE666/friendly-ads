<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('full_description')->nullable();
            $table->unsignedInteger('category_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->json('parameters')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('CASCADE');

            $table->decimal('amount', 9,1)->default(0);
            $table->decimal('sum_pay', 9,1)->default(0);

            $table->string('type_task')->nullable();
            $table->string('type_position')->nullable();
            $table->integer('site_count')->nullable();
            $table->integer('period')->nullable();
            $table->integer('views')->default(0);
            $table->integer('isActive')->default(0);
            $table->integer('isPay')->default(0);

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
        Schema::dropIfExists('tasks');
    }
}
