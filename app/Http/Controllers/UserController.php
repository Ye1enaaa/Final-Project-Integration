<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function getuser($studentId){
        $user = User::where('studentId', $studentId)->get();
        return response([
            'user' => $user
        ]);
    }
}
