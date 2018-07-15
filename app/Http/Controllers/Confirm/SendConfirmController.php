<?php

namespace App\Http\Controllers\Confirm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Confirm\SendConfirm;
use App\User;
use Auth;

class SendConfirmController extends Controller
{
    public function sendCompetitionConfirm(Request $request)
    {
        $user = User::find(Auth::user()->id);

        Mail::to($user->email)->send(new SendConfirm($user));
    }

    public function sendEventConfirm(Request $request)
    {
        
    }
}
