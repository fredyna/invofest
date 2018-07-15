<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Events\Auth\UserActivationEmail;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::where('email', $request->email)->where('activation_token', $request-> token);

        $user->update([
            'active'            => true,
            'activation_token'  => null
        ]);

        return redirect()->route('login')->withSuccess('Aktivasi email berhasil. Silahkan login!');
    }

    public function showResendForm()
    {
        return view('auth.activate.resend');
    }

    public function resend(Request $request)
    {
        $this->validateResendRequest($request);
        $user = User::where('email', $request->email)->first();
        event(new UserActivationEmail($user));

        return redirect()->route('login')->withSuccess('Aktivasi email telah dikirim. Silahkan cek email anda!');
    }

    private function validateResendRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'Email anda belum terdaftar!'
        ]);
    }
}
