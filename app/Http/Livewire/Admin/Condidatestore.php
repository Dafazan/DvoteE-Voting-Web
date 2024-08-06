<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condidate as ModelsCondidate;
use App\Models\Position;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Condidatestore extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $posts = Post::all();
    //     return view('admin.user.news', ['posts' => $posts]);
    // }
    // public function create()
    // {
    //     return view('dashboard.create');
    // }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname'     => 'required',
            'lname'   => 'required',
            'pos_id'      => 'required',
            'detail'      => 'required',
            'image'     => 'image|mimes:png,jpg,jpeg'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('condidate');
        }

        Condidate::create($validatedData);
        return redirect('/admin/condidates');
    }
    // public function show(Post $post)
    // {
    //     return view('dashboard.view', [
    //         'post' => $post
    //     ]);
    // }
    // public function edit(Post $post)
    // {
    //     return
    //         view('dashboard.edit', [
    //             'post' => $post
    //         ]);
    // }
    // public function update(Request $request, Post $post)
    // {
    //     $rules = [
    //         'image'     => 'image|mimes:png,jpg,jpeg',
    //         'title' => 'required|max:255',
    //         'body' => 'required'
    //     ];


    //     $validatedData = $request->validate($rules);
    //     if ($request->file('image')) {
    //         if($request->oldImage){
    //             Storage::delete($request->oldImage);
    //         }
    //         $validatedData['image'] = $request->file('image')->store('post-images');
    //     }
    //     Post::where('id', $post->id)
    //         ->update($validatedData);

    //     return redirect('/dashboard/post/');
    // }

    // public function destroy(Post $post)
    // {
    //     if ($post->image) {
    //         Storage::delete($post->image);
    //     }
    //     Post::destroy($post->id);
    //     return redirect('/dashboard/post');
    // }
    
}
