<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Models\Blog;
use http\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            if ($request->status) {
                $input['status'] = true;
            }
            $input['image'] = $this->createOrUpdateImage($request);
            Blog::create($input);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog Added Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('blog.index')->with('failed', 'Blog Cannot be Added');
        }
    }

    public function createOrUpdateImage($request)
    {
        if ($request->hasFile('image')) {
            return $request->image->store('public/blog');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogStoreRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $blog = Blog::find($id);
            if ($request->status == 'on') {
                $input['status'] = true;
            } else {
                $input['status'] = false;
            }
            if ($request->hasFile('image')) {
                $input['image'] = $this->createOrUpdateImage($request);
            }
            $blog->update($input);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('blog.index')->with('failed', 'Blog Cannot be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $searchBlog = Blog::find($id);
            DB::beginTransaction();
            $searchBlog->delete();
            Storage::delete($searchBlog->image);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog deleted successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('blog.index')->with('failed', 'Blog Cannot be deleted');
        }
    }
}
