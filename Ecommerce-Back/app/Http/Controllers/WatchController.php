<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watch;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watches = Watch::orderBy('id', 'desc')->with('category')->paginate(2);
        return view('watch.index', compact('watches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('watch.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required', 
            'image' => 'required|mimes:png,jpg,webp', 
            'description' => 'required',
        ]);

        $file = $request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'), $file_name);

        Watch::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'price'       => $request->price,
            'image'       => $file_name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Watch created!');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $watch = Watch::where('id', $id)->with('category')->first();
        return view('watch.edit', compact('watch', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Category ထည့်ပေးပါ'
        ]);

        $watch = Watch::where('id', $id);
        if($request->file('image')){
            File::delete(public_path('/images/'.$watch->first()->image));
            $file = $request->file('image');
            $file_name = uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'), $file_name);
        }else {
            $file_name = $watch->first()->image;
        }

        $watch->update([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'price'       => $request->price,
            'image'       => $file_name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Watch Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watch = Watch::where('id', $id);
        File::delete(public_path('/images/'.$watch->first()->image));
        $watch->delete();
        return redirect()->back()->with('success', 'Product deleted!');
    }
}
