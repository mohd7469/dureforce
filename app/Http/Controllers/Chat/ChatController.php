<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getUsers()
    {
        $users=User::where('last_role_activity',Role::$Freelancer)->get();
       
        return response()->json(['users'=> $users]);
    }
}
