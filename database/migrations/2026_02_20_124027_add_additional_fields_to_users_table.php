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
        //dodavanje dodatnih atributa u tablicu korisnika
        Schema::table('users', function (Blueprint $table) {
            //nullable zbor usera koje već imamo unutra
            //i stavljamo to polje nakon emaila
            $table->date('dbirth')->nullable()->after('email'); 
            //staviti ćemo i spol
            $table->char('sex',1)->nullable()->after('dbirth');
            //staviti ćemo i tip usera 0 za običnog 1 za admina
            $table->char('utype',1)->nullable()->after('sex');
            //staviti ćemo status računa
            $table->string('status',20)->nullable()->after('utype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dbirth');
            $table->dropColumn('sex');
            $table->dropColumn('utype');
            $table->dropColumn('status');
        });
    }
};
