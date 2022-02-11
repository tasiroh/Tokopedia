<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "users",
            "result" => $users
        ];

        return response()->json($output, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $user = User::create($input);

        return response()->json($user, 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $user->fill($input);
        $user->save();

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            abort(404);
        }

        $user->delete();
        $message = ["Pesan" => "Hapus halaman berhasil", "user_id" => $id];
        $message = ["Pesan" => "Hapus halaman berhasil", "user_id" => $id];

        return response()->json($message, 200);
    }
}