@component('mail::message')
# Aktivasi akun anda
<center><img src="{{ url('img/logo/invofest_logo.png') }}" alt="Logo Invofest" width="100px"></center><br />
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
