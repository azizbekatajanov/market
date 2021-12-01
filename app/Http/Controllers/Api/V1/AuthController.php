<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function register(UserRequest $request)
    {
        $user = User::query()->create([
            'username'=>$request->username,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'avatar'=> Storage::putFile('avatars' , $request->file('avatar'))

        ]);
//        $user->avatar = $request->file('avatar')->store('avatars/'.$user->id);
//        $user->save();
        $user->assignRole('user');
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('username', 'password'))){
            return response()->json([
                'message'=>'Invalid login details'
            ], 401);
        }
        $user = User::where('username', $request['username'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token'=> $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }
}
