<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
/* use Illuminate\Support\Facades\Storage; */

// Request Validations
use App\Http\Requests\Article\Store;

// Model
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('Admin/Article/index-article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Article/create-article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        // return response()->json($request);
        // Initiate the image
        $imageName = Carbon::now() . '.' . $request->image->extension();
        /* $request->image->storeAs('images/articles', $imageName); */

        // Experiment CDN
        // Work well, but need to re-configure in server
        // Add image_cloud_name when created the resource
        $response = cloudinary()->upload($request->file('image')->getRealPath(), [
            'public_id' => $imageName,
            'folder' => 'kbmti_article'
        ])->getSecurePath();
        /* return response()->json($response); */
        /* dd($response); */

        Article::create([
            'name' => $request->name,
            'content' => $request->content,
            /* 'image' => $imageName, */
            // Cloudinary experiment
            'image' => $response,
            'image_cloud_name' => $imageName,
        ])->save();
        return back()
            ->with('response', [
                'type' => 'success',
                'msg' => 'Penambahan Artikel telah berhasil!'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $name = str_replace('-', ' ', $name);
        $article = Article::where('name', $name)->first();
        return view('Admin/Article/show-article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        // return response()->json([
        //     'name' => $name
        // ]);
        $name = str_replace('-', ' ', $name);
        $article = Article::where('name', $name)->first();
        return view('Admin/Article/edit-article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if ($request->image) {
            

            /* Storage::delete('images/articles/' . $article->image); */
            $imageName = Carbon::now() . '.' . $request->image->extension();
            /* $request->image->storeAs('images/articles', $imageName); */
            /* $article->image = $imageName; */

            // Experiment Cloudinary
            // Delete the resource
            cloudinary()->destroy("kbmti_article/$article->image_cloud_name"); 
            // Input new image
             $response = cloudinary()->upload($request->file('image')->getRealPath(), [
                 'public_id' => $imageName,
                 'folder' => 'kbmti_article'
            ])->getSecurePath();
            /* return response()->json($response); */
            /* dd($response); */
            $article->image = $response;
            $article->image_cloud_name = $imageName;
        }
        // Change the name and content
        $article->name = $request->name;
        $article->content = $request->content;
        $article->save();
        return back()
            ->with('response', [
                'type' => 'success',
                'msg' => 'Pengeditan artikel berhasil dilakukan!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        /* Storage::delete('images/articles/' . $article->image); */
        // Experiment Cloudinary 
        // Delete the resource in cloudinar
        cloudinary()->destroy("kbmti_article/$article->image_cloud_name");

        Article::where('id', $id)->delete();
        // return back()->with('success', 'Penghapusan artikel berhasil dilakukan');
        return back()
            ->with('response', [
                'type' => 'success',
                'msg' => 'Penghapusan artikel berhasil dilakukan!'
            ]);
    }
}
