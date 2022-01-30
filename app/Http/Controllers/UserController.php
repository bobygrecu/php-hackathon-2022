<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return $this->users->index();
    }

    public function create(Request $request)
    {
        $newUser = $request->only('name', 'CNP', 'create');

        $this->users->create($newUser);
    }

    public function update($userId, Request $request)
    {
        $user = $request->only('name', 'CNP', 'create');

        if (! $this->users->update($userId, $user)) {
            return 'User not updated';
        }

        return 'User has been updated.';
    }

    public function delete($userId)
    {
        return $this->users->delete($userId);
    }
}
