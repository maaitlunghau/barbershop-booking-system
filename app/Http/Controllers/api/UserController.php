<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->orderBy('id', 'desc')->paginate(10);
        return response()->json($users, 200);
    }

    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);
        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }

    public function ban(User $user)
    {
        if ($user->status === 'inactive') {
            return response()->json([
                'message' => 'This user has been banned.'
            ], 400);
        }

        $user->update(['status' => 'inactive']);

        // TODO: send email thông báo
        // ...

        return response()->json([
            'message' => 'Ban user successfully.'
        ], 200);
    }

    public function unban(User $user)
    {
        if ($user->status !== 'inactive') {
            return response()->json([
                'message' => 'This user is not banned.'
            ], 400);
        }

        $user->update(['status' => 'active']);

        // TODO: send mail thông báo
        // ...

        return response()->json([
            'message' => 'Unbanned user successfully.'
        ], 200);
    }
}
