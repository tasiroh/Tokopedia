<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProductCommentController extends BaseController
{
    

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

    
}