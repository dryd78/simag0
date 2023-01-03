<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->char('nik',16)->unique();
            $table->string('name');
            $table->char('nip',9)->unique();
            $table->string('image')->nullable();
            $table->string('status');
            $table->string('branch');
            $table->string('departement');
            $table->string('position');
            $table->char('grade');
            $table->string('email')->unique();
            $table->char('phone', 12);
            $table->text('address');
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
        Schema::dropIfExists('employees');
    }
};
