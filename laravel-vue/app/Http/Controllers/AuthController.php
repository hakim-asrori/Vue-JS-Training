<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name')->orderBy('id', 'desc')->get();

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'name' => 'required',
        //     'email' => 'email|unique:users|required',
        //     'password' => 'required',
        // ]);

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|unique:users|required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 403);
        }

        $validate['password'] = Hash::make($request->password);

        $user = User::create($validate);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',
            "data" => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 403);
        }

        $user->where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',
            "data" => $user
        ]);
    }

    public function upload(Request $request, $id)
    {
        $user = User::find($id);

        $validate = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:png,jpg',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 403);
        }

        if (file_exists($user->foto)) {
            @unlink('images/' . $user->foto);
        }

        $imageName = date('Y_m_d') . '_' . time() . '_' . $user->id . '_' . Str::random(40) . '.png';

        $user->foto = $imageName;
        $user->save();

        $request->foto->move(public_path('images'), $imageName);

        return response()->json([
            'status' => true,
            'message' => 'Gambah berhasil diupload',
        ]);
    }

    public function destroy($id)
    {
        $user = User::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}
