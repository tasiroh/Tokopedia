<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    public function index()
    {
        $comments = Comments::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "comments",
            "result" => $comments
        ];

        return response()->json($output, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $comments = Comments::create($input);

        return response()->json($comments, 200);
    }

    public function show($id)
    {
        $comments = Comments::find($id);

        if (!$comments) {
            abort(404);
        }

        return response()->json($comments, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $comments = Comments::find($id);

        if (!$comments) {
            abort(404);
        }

        $comments->fill($input);
        $comments->save();

        return response()->json($comments, 200);
    }

    public function destroy($id)
    {
        $comments = Comments::find($id);
        
        if (!$comments) {
            abort(404);
        }

        $comments->delete();
        $message = ["Pesan" => "Hapus halaman berhasil", "comments_id" => $id];

        return response()->json($message, 200);
    }
}