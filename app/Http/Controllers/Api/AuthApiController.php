<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($user) {
            $token = $user->createToken('authToken')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Register success',
                'data' => [
                    'token' => $token,
                    'user' => $user,
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register failed',
                'data' => null,
            ]);
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $login = auth()->attempt($request->input());

        if ($login) {
            return response()->json([
                'success' => true,
                'message' => 'Login success',
                'data' => [
                    'token' => auth()->user()->createToken('authToken')->accessToken,
                    'user' => auth()->user(),
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email or password is wrong.',
                'data' => null,
            ]);
        }
    }

    public function logout()
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'success' => true,
            'message' => 'Logout success',
            'data' => null,
        ]);
    }

    /**
     *  @OA\Get(
     *      path="/api/profile",
     *      operationId="get-profile",
     *      summary="Get user profile",
     *      description="get user profile",
     *      tags={"Authetication"},
     *      security={
     *          {"api_key": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *              mediaType="application/json"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *  )
     */
    public function profile()
    {
        return response()->json([
            'success' => true,
            'message' => 'Get data success',
            'data' => auth()->user(),
        ]);
    }
}
