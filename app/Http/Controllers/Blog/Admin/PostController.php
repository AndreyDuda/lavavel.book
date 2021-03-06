<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /** @var BlogPostRepository  */
    private $blogPostRepository;
    /** @var BlogCategoryRepository */
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getAllWithPaginate(25);
        return view('blog.admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $post = new BlogPost();
        $categories = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.edit',
            compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();
        $post = new BlogPost();

        $post = $post->create($data);

        if ($post) {
            return redirect()->route('blog.admin.posts.edit', [$post->id]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->blogPostRepository->getEdit($id);
        if (empty($post)) {
            abort(404);
        }

        $categories = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.edit',
            compact('post', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $post = $this->blogPostRepository->getEdit($id);

        if (empty($post)) {
            return back()
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }
        $data = $request->all();

        $result = $post->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.posts.edit', $post->id)
                ->with(['success', 'Успешно сохраненно']);
        } else {
            return back()
                ->withErrors(['msq' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = BlogPost::destroy($id);

        if ($result) {
            return redirect()
                ->route('blog.admin.post.index')
                ->with(['success' => 'запичь удалена']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
