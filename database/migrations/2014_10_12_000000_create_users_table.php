<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::TABLE, function (Blueprint $table) {
            $table->bigIncrements(User::PROP_ID);
            $table->string(User::PROP_NAME);
            $table->string(User::PROP_EMAIL)->unique();
            $table->timestamp(User::PROP_EMAIL_VERIFIED_AT)->nullable();
            $table->string(User::PROP_PASSWORD);
            $table->rememberToken();
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
        Schema::dropIfExists(User::TABLE);
    }
}
