@component('mail::message')
# Aktivasi akun anda

Terimakasih telah mendaftar, silahkan konfirmasi akun anda dengan mengklik link di bawah ini.

@component('mail::button', ['url' => route('auth.activate', 
                                [
                                'token' => $user->activation_token,
                                'email' => $user->email
                                ])
                            ]
            )
    Konfirmasi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
