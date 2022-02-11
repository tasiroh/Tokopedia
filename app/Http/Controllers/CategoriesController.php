<?php

namespace App\Http\Controllers;

use App\Models\Categoriesposts;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CategoriesController extends BaseController
{
    public function index()
    {
        $categoryposts = Categories::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "categoryposts",
            "result" => $categoryposts
        ];

        return response()->json($output, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $categoryposts = Categories::create($input);

        return response()->json($categoryposts, 200);
    }

    public function show($id)
    {
        $categoryposts = Categories::find($id);

        if (!$categoryposts) {
            abort(404);
        }

        return response()->json($categoryposts, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $categoryposts = Categories::find($id);

        if (!$categoryposts) {
            abort(404);
        }

        $categoryposts->fill($input);
        $categoryposts->save();

        return response()->json($categoryposts, 200);
    }

    public function destroy($id)
    {
        $categoryposts = Categories::find($id);
        
        if (!$categoryposts) {
            abort(404);
        }

        $categoryposts->delete();
        $message = ["Pesan" => "Hapus halaman berhasil", "categoryposts_id" => $id];

        return response()->json($message, 200);
    }
}