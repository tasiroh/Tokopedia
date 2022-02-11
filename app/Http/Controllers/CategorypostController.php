<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Categorypost;
use Illuminate\Http\Client\ResponseSequence;

class CategorypostController extends Controller
{
    public function index()
    {
        $categories = Categorypost::get();

        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $category = Categorypost::find($id);

        return response()->json($category, 200);
    }

    public function store()
    {
        $attr = request()->all();
        
        $category = Categorypost::create($attr);

        return response()->json($category, 200);
    }

    public function update($id)
    {
        $category = Categorypost::find($id);
        $input = request()->all();
       
        $category->fill($input);
        $category->save();

        return response()->json($category, 200);
    }

    public function delete($id)
    {
        $category = Categorypost::find($id);

        $category->delete();
        $message = ['message' => 'delete successfully', 'Category_id' => $id];
        return response()->json($message, 200);
    }
}
