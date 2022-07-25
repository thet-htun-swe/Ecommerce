<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Watch;


class ApiController extends Controller
{
    public function showCategory(){
        $category = Category::all();
        return response()->json(['success'=>true, 'data'=>$category]);
    }

    public function showWatch(Request $request){
        // $watch = Watch::orderBy('id', 'desc')
        // ->with('category')
        // ->paginate(6);

        $watch = Watch::orderBy('id', 'desc');
        if($request->category_id){
            $watch->where('category_id', $request->category_id);
        }

        $watch = $watch->paginate(2);
        return response()->json(['success'=>true, 'data'=>$watch]);
    }
}
