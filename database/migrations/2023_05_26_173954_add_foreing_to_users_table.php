<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->index("role_id", "user_role_id_idx");
            $table->foreign("role_id", "user_role_id_fk")->on("roles")->references("id");

            $table->index("type_user_id", "user_type_user_id_idx");
            $table->foreign("type_user_id", "user_type_user_id_fk")->on("type_users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
