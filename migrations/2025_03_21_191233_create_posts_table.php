<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->datetimes();

            $table->string('title', 100);
            $table->string('slug', 100)->index();
            $table->text('content');
            $table->bigInteger('score')
                ->index()
                ->nullable()
                ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
