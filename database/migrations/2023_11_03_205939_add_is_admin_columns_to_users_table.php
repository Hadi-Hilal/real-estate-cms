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
            //
            $table->string('mobile')->nullable()->after('email');
            $table->enum('type' ,['admin' , 'customer' , 'user'])->default('user')->after('mobile');
            $table->boolean('super_admin')->default(false)->after('type');
            $table->timestamp('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn([ 'mobile' ,'type' , 'super_admin' ]);
        });
    }
};
