<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        $user = \DB::transaction(function () use ($request) {
            $user = User::create($request->validated());

            if ($request->hasFile('profile_image')) {
                $path = $request->file('profile_image')->storePubliclyAs('public', "{$user->id}.{$request->file('profile_image')->clientExtension()}");

                $user->update(['profile_image' => $path]);
            }

            return $user;
        });

        return response()->json(['message' => 'User registered successfully', 'user' => $user]);
    }
}
