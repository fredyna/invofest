<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Peserta;

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

        $data = [
            'id_peserta'    => 'inv' . $unix_time . $random, 
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
        }

        $data['asal_institusi']     = $request->asal_institusi != '' ? strtoupper($request->asal_institusi) : null;
        

        if(isset($request->ktm)){
            $request->ktm->store('public/ktm');
            $path_foto = $request->ktm->hashName();
            $data['foto_ktm']   = $path_foto;
        }

        $event = new Peserta($data);
        if($event->save())
        {
            return redirect()->back()->withSuccess('Registrasi berhasil! Silahkan lakukan pembayaran dan konfirmasi pembayaran ke email invofest@gmail.com atau ke salah satu CP yang tertera di informasi acara.');
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
