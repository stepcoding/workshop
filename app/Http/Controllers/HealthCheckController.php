<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class HealthCheckController extends Controller
{
    public function index()
    {
         $user = User::with('roles')->find(1);
        // $user->name = "tak";
        // $user->save();
        // $user->roles()->detach();
        // $user->roles()->attach(2);
        return $user;
    }
}
