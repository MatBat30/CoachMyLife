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
            $table->unsignedBigInteger('programme_id')->nullable()->after('password');
            $table->foreign('programme_id')->references('id')->on('programmes');
            $table->date('date_naissance')->nullable()->after('programme_id');
            $table->string('sex', 10)->nullable()->after('date_naissance');
            $table->float('poids')->nullable()->after('sex');
            $table->integer('taille')->nullable()->after('poids');
            $table->string('telephone')->nullable()->after('taille');
            $table->string('adresse')->nullable()->after('telephone');
            $table->boolean('tache_is_completed')->default(false);
            $table->integer('points')->default(0);
            $table->string('niveau')->nullable();
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
