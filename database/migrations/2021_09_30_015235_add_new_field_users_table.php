<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->enum('role', ['admin', 'teacher', 'student'])->default('student');
            $table->jsonb('bio')->nullable()->default(json_encode([
                'phone' => null,
                'address' => null,
                'date_of_birth' => null
            ]));
            $table->string('avatar')->nullable();
            $table->jsonb('extra')->nullable('[]');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
