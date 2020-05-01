<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\BlogCategory;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BlogCategory::TABLE, function (Blueprint $table) {
            $table->bigIncrements(BlogCategory::PROP_ID);
            $table->bigInteger(BlogCategory::PROP_PARENT_ID)->default(0);

            $table->string(BlogCategory::PROP_SLUG)->unique();
            $table->string(BlogCategory::PROP_TITLE);
            $table->text(BlogCategory::PROP_DESCRIPTION)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(BlogCategory::TABLE);
    }
}
