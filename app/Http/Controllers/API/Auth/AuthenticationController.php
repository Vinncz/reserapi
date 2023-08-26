<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\API\Auth\LoginUserRequest;
use App\Http\Requests\API\Auth\StoreUserRequest;

class AuthenticationController extends Controller
{
    use HttpResponses;

    public function login (LoginUserRequest $request) {
        $request->validated($request->only([
            "email",
            "password"
        ]));

        if ( !Auth::attempt($request->only(["email", "password"])) ) {
            return $this->error(null, "Credentials do not match", 401);
        }

        $user = User::where("email", $request->email)->first();

        return $this->success([
            "user"  => $user,
            "token" => $user->createToken("API Token for user with the name of: ".$user->name)->plainTextToken
        ]);
    }

    public function register (StoreUserRequest $request) {
        $request -> validated($request->only([
            "name", "username", "email", "password"
        ]));

        $user = User::create([
            "name"      => $request->name,
            "username"  => $request->username,
            "email"     => $request->email,
            "password"  => $request->password,
        ]);

        return $this->success([
            "user"  => $user,
            "token" => $user->createToken("API Token for user with the name of: ".$user->name)->plainTextToken
        ]);
    }

    public function logout () {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            "message" => "Your token has been deleted"
        ], "Successfully logged you out");
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        //
    }
}
