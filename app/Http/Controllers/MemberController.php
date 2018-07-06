<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class MemberController extends Controller
{
    public function showKompetisi()
    {
        $user = User::find(Auth::user()->id)->kompetisi()->first(); 
        $data = [
            'user'  => $user
        ];
        return view('member.member_home')->with($data);
    }
}
