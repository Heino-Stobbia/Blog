<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function index() {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }

    public function store(Request $request) {
        return response()->json([
            'message' => 'Saved'
        ]);
    }

    public function show($id) {
        return response()->json([
            'message' => "Show"
        ]);
    }

    public function update(Request $request, $id) {
        return response()->json([
            'message' => "Updated"
        ]);
    }

    public function destroy($id) {
        return response()->json([
            'message' => "Deleted"
        ]);
    }

    public function login(Request $request) {

        $userdata = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);

        if(!Auth::attempt($userdata)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ]);
        }

        $user = Auth::user();

        $token = $user->createToken('API token')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function register(Request $request) {

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8'
        ]);
        
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'message' => 'Registered Successfully !!!'
        ]);
    }
}
