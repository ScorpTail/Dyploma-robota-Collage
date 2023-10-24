<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->text("title");
            $table->text("description");
            $table->unsignedBigInteger("price");
            $table->integer("status")->nullable();
            $table->string("images");
            $table->timestamps();
            $table->softDeletes();

            $table->index("user_id", "service_user_id_idx");
            $table->foreign("user_id", "service_user_id_fk")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
