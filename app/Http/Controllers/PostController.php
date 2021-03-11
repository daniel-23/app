<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Posts/Index',[
            'filters' => \Request::all('search'),
            'posts'   => auth()->user()->posts()
                                ->orderBy('id', 'DESC')
                                ->filter(\Request::only('search'))
                                ->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());
        $request->session()->flash('status', 'Post created successfully!');
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (! Gate::allows('show-post', $post)) {
            return Inertia::render('Errors/403');
            #abort(403);
        }

        return Inertia::render('Posts/Show',[
            'post' => $post,
            'canUpdatePost' => Gate::allows('update-post', $post),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (! Gate::allows('update-post', $post)) {
            return Inertia::render('Errors/403');
            #abort(403);
        }
        return Inertia::render('Posts/Edit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if (! Gate::allows('update-post', $post)) {
            #return Inertia::render('Errors/403');
            abort(403);
        }
        $post->update($request->validated());
        $request->session()->flash('status', 'Post modified successfully!');
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file->store('posts', 'public');
            return response()->json(['path' => $path, 'status' => 'ok'],200);
        }
        return response()->json(['status' => 'no'],200);
    }
}
