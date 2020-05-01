<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\BlogPost;
use App\Models\User;
use App\Models\BlogCategory;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BlogPost::TABLE, function (Blueprint $table) {
            $table->bigIncrements(BlogPost::PROP_ID);
            $table->bigInteger(BlogPost::PROP_CATEGORY_ID)->unsigned();
            $table->bigInteger(BlogPost::PROP_USER_ID)->unsigned();
            $table->string(BlogPost::PROP_SLUG);
            $table->string(BlogPost::PROP_TITLE);
            $table->text(BlogPost::PROP_EXCERPT);
            $table->text(BlogPost::PROP_CONTENT_RAW);
            $table->text(BlogPost::PROP_CONTENT_HTML);
            $table->boolean(BlogPost::PROP_IS_PUBLISHED);
            $table->timestamp(BlogPost::PROP_PUBLISHED_AT);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(BlogPost::PROP_USER_ID)->references(User::PROP_ID)->on(User::TABLE);
            $table->foreign(BlogPost::PROP_CATEGORY_ID)->references(BlogCategory::PROP_ID)->on(BlogCategory::TABLE);

            $table->index(BlogPost::PROP_IS_PUBLISHED);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(BlogPost::TABLE);

    }
}
