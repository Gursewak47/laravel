<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees_storedas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('employee_id');
            $table->jsonb('metadata');
            $table->string('first_name')->storedAs("(metadata->>'first_name')")->nullable();
            $table->string('last_name')->storedAs("(metadata->>'last_name')")->nullable();
            $table->string('email')->storedAs("(metadata->>'email')")->nullable();
            $table->string('salary', 24, 8)->storedAs("(metadata->>'salary')::text::decimal")->nullable();
            $table->string('phone')->storedAs("(metadata->>'phone')")->nullable();
            $table->string('address')->storedAs("(metadata->>'address')")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_storedas');
    }
};
