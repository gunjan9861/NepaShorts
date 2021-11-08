<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'photo' => 'required',

        ]);
        $imageName = null;
        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('blog_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('blog_image', $imageName, 'public');

        }
        try{
            Blog::create(
                [
                    'title' => $request['title'],
                    'content' => $request['content'],
                    'author' => $request['author'],
                    'photo' => $imageName,
                    'meta_title' => \request('seo_title'),
                    'meta_keywords' => \request('seo_keywords'),
                    'meta_description' => \request('seo_description'),
                    'status' => $request['status']? 1 : 0
                ]);
            Toastr::success('Blog Creted Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.blogs.index');
        } catch (\Throwable $exception) {
            Toastr::error('Blog Cannot Be Created, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);
        if ($request->file('photo')) {
            $imagePath = $request->file('photo');
            $imageName = strtolower('blog_') . '_' . time() . '_' . $imagePath->getClientOriginalName();
            $request->file('photo')->storeAs('blog_image', $imageName, 'public');
        } else {
            $imageName = $blog->photo;
        }
        try {
            $blog->update(
                [
                    'title' => $request['title'],
                    'content' => $request['content'],
                    'author' => $request['author'],
                    'photo' => $imageName,
                    'meta_title' => \request('seo_title'),
                    'meta_keywords' => \request('seo_keywords'),
                    'meta_description' => \request('seo_description'),
                    'status' => $request['status'] ? 1 : 0
                ]);
            Toastr::success('Blog Edited Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.blogs.index');
        } catch (\Throwable $exception) {
            Toastr::error('Blog Cannot Be Deleted, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            Toastr::success('Blog Deleted Successfully', 'Success', ["position" => "toasts-top-center"]);
            return redirect()->route('admin.blogs.index');
        } catch (\Throwable $exception) {
            Toastr::error('Blog Cannot Be Deleted, Try Again !! ', 'Error', ["position" => "toasts-top-center"]);
            return redirect()->back();
        }
    }
}
