<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\Category;
use App\Http\Requests\BlogRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all()->toArray();
        $userId = Auth::user()->id;
        $blogs = User::find($userId)->with('blogs.categories')->first()->toArray();
        // dd($blogs);
        return view('home', compact('categories', 'blogs'));
    }

    /**
     * this function will send all the blogs of one perticualr user
     * we can use this api response to show data to frontend do filterdata but I have worked
     * with backend part only in my entire career so don't have an expirence in data
     * setup with AJAX requiest.
     */
    public function getUserBlogs()
    {
        $userId = Auth::user()->id;
        $blogs = User::find($userId)->with('blogs.categories')->get()->toArray();
        return createResponse(true, "", $blogs);
    }

    /**
     * Add New Blog
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function addBlog(BlogRequest $request)
    {
        $requestData = $request->all();
        $userId = Auth::user()->id;
        $blogCategory = array();
        try {
            $blog = new Blog();
            $blogData = $blog->addBlogData($requestData, $userId);
            foreach ($requestData['category'] as $key => $value) {
                array_push($blogCategory, [
                    'blog_id' => $blogData->id,
                    'category_id' => $value,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            BlogCategory::insert($blogCategory);
            return response()->json(createResponse(true, "Your Blog Created Successfully!"));
        } catch (\Exception $e) {
            return response()->json(createResponse(false, $e->getMessage()));
        }
    }

    public function showBlogs($blogId)
    {
        $blog = Blog::find($blogId)->with('categories')->first();
        $userName = Blog::find($blogId)->user->name;
        return view('blog', compact('blog', 'userName'));
    }
}
