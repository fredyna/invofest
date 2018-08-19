<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Confirm\SendRegistrationEventSuccess;
use Illuminate\Support\Facades\Input;

use App\Peserta;
use Mail;

class EventController extends Controller
{
    public function showRegistrasi()
    {
        return view('umum.registrasiEvent');
    }

    public function registrasi(Request $request)
    {
        $this->validate($request, [
            'kategori'          => 'required',
            'nama'              => 'required|min:3',
            'email'             => 'required|email|unique:pesertas',
            'nomor_hp'          => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'            => 'required',
        ], $this->messages());

        $unix_time = time();
        $random    = rand(10, 99);
        $id        = 'inv' . $unix_time . $random;

        $data = [
            'id_peserta'    => $id, 
            'kategori'      => $request->kategori,
            'nama'          => strtoupper($request->nama),
            'email'         => $request->email,
            'nomor_hp'      => $request->nomor_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
        ];

        if($request->workshop == '' && $request->talkshow == '' && $request->seminar == '')
        {
            $this->validate($request, [
                'event' => 'required',
            ], $this->messages());
        }

        if($request->workshop != ''){
            $this->validate($request, [
                'kategori_workshop'          => 'required',
            ], $this->messages());

            $data['workshop'] = true;
            $data['kategori_workshop'] = $request->kategori_workshop;
        }

        if($request->talkshow != ''){
            $data['talkshow'] = true;
        }
        if($request->seminar != ''){
            $data['seminar'] = true;
        }

        if($request->kategori == 'Mahasiswa'){
            $this->validate($request, [
                'asal_institusi'    => 'required',
                'ktm'          => 'required|file|mimetypes:image/jpeg,image/png|max:2048',
            ], $this->messages());

            if (Input::file('ktm')->isValid())
            {
                $destinationPath = 'uploads/ktm';
                $extension = Input::file('ktm')->getClientOriginalExtension();
                $fileName = $id . '.' . $extension;
                Input::file('ktm')->move($destinationPath, $fileName);

                $data['foto_ktm']   = $fileName;
            }
        }

        $data['asal_institusi']     = $request->asal_institusi != '' ? strtoupper($request->asal_institusi) : null;

        $event = new Peserta($data);
        if($event->save())
        {
            $peserta = Peserta::find($data['id_peserta']); //get data peserta yang baru registrasi
            //kirim email info registrasi sukses
            Mail::to($peserta->email)->send(new SendRegistrationEventSuccess($peserta));

            return redirect()->back()->withSuccess('Registrasi berhasil! Silahkan cek inbox email Anda. Jika tidak menemukan di inbox, cek di spam email!.');
        } 
        else
        {
            return redirect()->back()->withError('Registrasi gagal. Silahkan lakukan registrasi ulang!.');
        }
    }

    private function messages()
    {
        return [
            'kategori.required'         => 'Kategori harus dipilih!',
            'nama.required'             => 'Nama harus diisi!',
            'nama.min:3'                => 'Nama minimal 3 karakter',
            'asal_institusi.required'   => 'Asal institusi harus diisi!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Format email tidak sesuai!',
            'email.unique:pesertas'     => 'Email telah terdaftar',
            'nomor_hp.required'         => 'Nomor HP harus diisi!',
            'jenis_kelamin.required'    => 'Jenis kelamin harus diisi!',
            'alamat.required'           => 'Alamat harus diisi',
            'ktm.required'         => 'Foto KTM harus dilampirkan!',
            'ktm.mimetypes'         => 'Foto KTM harus berformat image/jpeg atau image/png!',
            'ktm.max:2048'         => 'Foto KTM tidak boleh melebihi 2MB',
            'ktm.file'             => 'Foto KTM harus berupa gambar/foto',
            'kategori_workshop.required'    => 'Kategori workshop harus dipilih!',
            'event.required'            => 'Pilih minimal 1 acara!',
        ];
    }
}
