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

    public function showFormIsiData($id=null)
    {
        if($id==null){
            return redirect()->back()->withErrors('Pilihlah salah satu kompetisi!');
        }

        $user = User::find(Auth::user()->id)->kompetisi()->first(); 
        $data = [
            'user'  => $user
        ];
        if($id =='adc' || $id == 'wdc'){
            return view('member.isidata_form1')->with($data);
        } else {
            return view('member.isidata_form2')->with($data);
        }
    }
}
