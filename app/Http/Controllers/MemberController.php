<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kompetisi;
use Auth;

class MemberController extends Controller
{
    /**
     * Halaman beranda member
     * 
     * - menampilkan daftar kompetisi ketika belum pernah daftar kompetisi
     * - menampilkan nama kompetisi yang diikuti jika sudah pernah mendaftar kompetisi
     */         
    public function showKompetisi()
    {
        $user = User::find(Auth::user()->id)->kompetisi()->first(); 
        $data = [
            'user'  => $user
        ];
        return view('member.member_home')->with($data);
    }

    /**
     * menampilkan form isi data peserta kompetisi
     */ 
    public function showFormIsiData($id=null)
    {
        if($id==null){
            return redirect()->back()->withErrors('Pilihlah salah satu kompetisi!');
        }

        $user = User::find(Auth::user()->id)->kompetisi()->first(); 
        $data = [
            'user'          => $user,
            'jenis_lomba'   => $id
        ];
        if($id =='adc' || $id == 'wdc'){
            return view('member.isidata_form1')->with($data);
        } else {
            return view('member.isidata_form2')->with($data);
        }
    }

    /**
     * method untuk menyimpan data peserta
     */
    public function simpanData(Request $request)
    {
        $this->validate($request, [
            'jenis_lomba'       => 'required|max:3',
            'asal_sekolah'      => 'required',
            'nama_ketua_tim'    => 'required',
            'no_ketua_tim'    => 'required',
            'email_ketua_tim'    => 'required',
            'foto_ketua_tim'    => 'required|file|mimetypes:image/jpeg,image/png|max:2048',
        ], $this->messages());

        if($request->nama_anggota_1 != null){
            $this->validate($request, [
                'nama_anggota_1'    => 'required',
                'no_anggota_1'    => 'required',
                'email_anggota_1'    => 'required',
                'foto_anggota_1'    => 'required|file|mimetypes:image/jpeg,image/png|max:2048',
            ]);
        }

        if($request->nama_anggota_2 != null){
            $this->validate($request, [
                'nama_anggota_2'    => 'required',
                'no_anggota_2'    => 'required',
                'email_anggota_2'    => 'required',
                'foto_anggota_2'    => 'required|file|mimetypes:image/jpeg,image/png|max:2048',
            ]);
        }

        $user = User::find(Auth::user()->id);

        $request->foto_ketua_tim->store('public/peserta');
        $path_foto = $request->foto_ketua_tim->hashName();

        $kompetisi = new Kompetisi([
            'jenis_lomba' => $request->jenis_lomba, 
            'asal_sekolah' => strtoupper($request->asal_sekolah), 
            'nama_ketua_tim' => strtoupper($request->nama_ketua_tim),
            'no_ketua_tim' => $request->no_ketua_tim, 
            'email_ketua_tim' => strtolower($request->email_ketua_tim), 
            'foto_ketua_tim' => $path_foto,
            'nama_anggota_1' => strtoupper($request->nama_anggota_1),
            'no_anggota_1'   => $request->no_anggota_1,
            'email_anggota_1' => strtolower($request->email_anggota_1),
            'nama_anggota_2' => strtoupper($request->nama_anggota_2),
            'no_anggota_2'   => $request->no_anggota_2,
            'email_anggota_2' => strtolower($request->email_anggota_2),
        ]);
        
        if($request->foto_anggota_1 != null)
        {
            $request->foto_anggota_1->store('public/peserta');
            $path_foto_1 = $request->foto_anggota_1->hashName();
            $kompetisi->foto_anggota_1   = $path_foto_1;
        }

        if($request->foto_anggota_2 != null)
        {
            $request->foto_anggota_2->store('public/peserta');
            $path_foto_2 = $request->foto_anggota_2->hashName();
            $kompetisi->foto_anggota_2   = $path_foto_2;
        }

        if($user->kompetisi()->save($kompetisi))
        {
            return redirect()->back()->withSuccess('Data berhasil disimpan!');
        } 
        else
        {
            return redirect()->back()->withError('Data gagal disimpan!');
        }
    }

    /**
     * method messages
     * 
     * untuk memberikan pesan ketika ada eror saat validasi form
     */
    public function messages()
    {
        return [
            'asal_sekolah.required' => 'Asal sekolah harus diisi',
            'nama_ketua_tim.required' => 'Nama ketua tim harus diisi',
            'no_ketua_tim.required' => 'Nomor HP ketua tim harus diisi',
            'email_ketua_tim.required' => 'Email ketua tim harus diisi',
            'foto_ketua_tim.required' => 'Foto harus disertakan',
            'nama_anggota_1.required' => 'Nama anggota 1 harus diisi',
            'no_anggota_1.required' => 'Nomor HP anggota 1 harus diisi',
            'email_anggota_1.required' => 'Email anggota 1 harus diisi',
            'nama_anggota_2.required' => 'Nama anggota 2 harus diisi',
            'no_anggota_2.required' => 'Nomor HP anggota 2 harus diisi',
            'email_anggota_2.required' => 'Email anggota 2 harus diisi',
            'foto_ketua_tim.required' => 'Foto harus disertakan',
            'foto_ketua_tim.mimetypes' => 'Foto harus berformat image/jpeg atau image/png',
            'foto_ketua_tim.max'    => 'Ukuran maksimal foto 2MB',
            'foto_anggota_1.max'    => 'Ukuran maksimal foto 2MB',
            'foto_anggota_2.max'    => 'Ukuran maksimal foto 2MB',
            'foto_anggota_1.mimetypes' => 'Foto harus berformat image/jpeg atau image/png',
            'foto_anggota_2.mimetypes' => 'Foto harus berformat image/jpeg atau image/png',

        ];
    }

    /**
     * method updateData
     * 
     * untuk perbarui data peserta kompetisi
     */
    public function updateData(Request $request)
    {
        $this->validate($request, [
            'jenis_lomba'       => 'required|max:3',
            'asal_sekolah'      => 'required',
            'nama_ketua_tim'    => 'required',
            'no_ketua_tim'    => 'required',
            'email_ketua_tim'    => 'required',
            'foto_ketua_tim'    => 'file|mimetypes:image/jpeg,image/png|max:2048',
        ], $this->messages());

        $user       = User::find(Auth::user()->id);
        $kompetisi  = $user->kompetisi()->first();

        if($kompetisi->foto_ketua_tim == null)
        {
            $this->validate($request,[
                'foto_ketua_tim'    => 'required'
            ]);
        }

        if($request->nama_anggota_1 != null){
            $this->validate($request, [
                'nama_anggota_1'    => 'required',
                'no_anggota_1'    => 'required',
                'email_anggota_1'    => 'required',
                'foto_anggota_1'    => 'file|mimetypes:image/jpeg,image/png|max:2048',
            ]);
            
            if($kompetisi->foto_anggota_1 == null)
            {
                $this->validate($request,[
                    'foto_anggota_1'    => 'required'
                ]);
            }
        }

        if($request->nama_anggota_2 != null){
            $this->validate($request, [
                'nama_anggota_2'    => 'required',
                'no_anggota_2'    => 'required',
                'email_anggota_2'    => 'required',
                'foto_anggota_2'    => 'file|mimetypes:image/jpeg,image/png|max:2048',
            ]);

            if($kompetisi->foto_anggota_2 == null)
            {
                $this->validate($request,[
                    'foto_anggota_2'    => 'required'
                ]);
            }
        }

        $data = [
            'jenis_lomba' => $request->jenis_lomba, 
            'asal_sekolah' => strtoupper($request->asal_sekolah), 
            'nama_ketua_tim' => strtoupper($request->nama_ketua_tim),
            'no_ketua_tim' => $request->no_ketua_tim, 
            'email_ketua_tim' => strtolower($request->email_ketua_tim),
            'nama_anggota_1' => strtoupper($request->nama_anggota_1),
            'no_anggota_1'   => $request->no_anggota_1,
            'email_anggota_1' => strtolower($request->email_anggota_1),
            'nama_anggota_2' => strtoupper($request->nama_anggota_2),
            'no_anggota_2'   => $request->no_anggota_2,
            'email_anggota_2' => strtolower($request->email_anggota_2),
        ];

        if($request->foto_ketua_tim != null)
        {
            $request->foto_ketua_tim->store('public/peserta');
            $path_foto = $request->foto_ketua_tim->hashName();
            $data['foto_ketua_tim']   = $path_foto;
        }
        
        if($request->foto_anggota_1 != null)
        {
            $request->foto_anggota_1->store('public/peserta');
            $path_foto_1 = $request->foto_anggota_1->hashName();
            $data['foto_anggota_1']   = $path_foto_1;
        }

        if($request->foto_anggota_2 != null)
        {
            $request->foto_anggota_2->store('public/peserta');
            $path_foto_2 = $request->foto_anggota_2->hashName();
            $data['foto_anggota_2']   = $path_foto_2;
        }

        if($user->kompetisi()->update($data))
        {
            return redirect()->back()->withSuccess('Data berhasil diperbarui!');
        } 
        else
        {
            return redirect()->back()->withError('Data gagal diperbarui!');
        }
    }

    /**
     * method kunci data
     * 
     * untuk melakukan kunci data peserta kompetisi
     */
    public function kunciData()
    {
        $user = User::find(Auth::user()->id);
        $kompetisi = $user->kompetisi()->first();

        if($kompetisi->id != null && $kompetisi->jenis_lomba != null)
        {
            if(!$kompetisi->lock)
            {
                $lock = [
                    'lock' => true
                ];
                if($user->kompetisi()->update($lock))
                {
                    return redirect()->back()->withSuccess("Berhasil kunci data!");
                }
            } else
            {
                return redirect()->back()->with("failed","Data sudah pernah dikunci!");
            }
        }
        
        return redirect()->back()->with("failed","Gagal kunci data!");
    }

    /**
     * method showKonfirmasi
     * 
     * untuk menampilkan halaman untuk upload berkas konfirmasi
     */
    public function showKonfirmasi()
    {
        $user = User::find(Auth::user()->id)->kompetisi()->first();
        if(isset($user->id) && $user->lock)
        {
            $data = [
                'user'  => $user
            ];
            return view('member.konfirmasi')->with($data);
        } 

        return redirect('member')->with('failed', 'Gagal mengakses halaman konfirmasi. Anda belum mengunci data!');
        
    }

    /**
     * method konfirmasi
     * 
     * untuk menangani proses upload berkas konfirmasi
     */
    public function konfirmasi(Request $request)
    {
        $this->validate($request, [
            'berkas_konfirmasi'    => 'required|file|mimetypes:application/x-compressed,application/x-zip-compressed,application/zip,multipart/x-zip,application/x-rar-compressed,application/octet-stream|max:2048'
        ]);

        $user = User::find(Auth::user()->id);
        $kompetisi = $user->kompetisi()->first();

        
        if($kompetisi->lock)
        {
            if($kompetisi->berkas_konfirmasi == null)
            {
                $request->berkas_konfirmasi->storeAs('public/berkas_konfirmasi', $request->berkas_konfirmasi->getClientOriginalName());
            }

            $berkas_konfirmasi = [
                'berkas_konfirmasi' => $request->berkas_konfirmasi->getClientOriginalName()
            ];

            if($user->kompetisi()->update($berkas_konfirmasi))
            {
                return redirect()->back()->withSuccess("Berhasil mengunggah berkas konfirmasi!");
            }
        }
        
        return redirect()->back()->with("failed","Gagal mengunggah berkas!");   
    }

    /**
     * method showFormUploadBerkas
     * 
     * untuk menampilkan form upload berkas
     */
    public function showFormUploadBerkas()
    {
        $user = User::find(Auth::user()->id)->kompetisi()->first(); 
        if(isset($user->id) && $user->konfirmasi)
        {
            $data = [
                'user'  => $user
            ];
            return view('member.form_berkas')->with($data);
        }

        return redirect()->back()->with("failed","Tidak bisa upload berkas, belum konfirmasi pendaftaran!");
    }

    /**
     * method 
     */
    public function uploadBerkas(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $kompetisi = $user->kompetisi()->first();

        if($kompetisi->id != null)
        {
            if($kompetisi->link_berkas == null)
            {
                if($kompetisi->jenis_lomba == 'adc')
                {
                    $this->validate($request, [
                        'link_berkas'   => 'required',
                        'link_video'    => 'required'
                    ]);
                    $link = [
                        'link_berkas' => $request->link_berkas,
                        'link_video' => $request->link_video
                    ];
                } else
                {
                    $this->validate($request, [
                        'link_berkas'   => 'required'
                    ]);
                    $link = [
                        'link_berkas' => $request->link_berkas
                    ];
                }
                
                if($user->kompetisi()->update($link))
                {
                    return redirect()->back()->withSuccess("Berhasil mengirim link!");
                }
            } else
            {
                return redirect()->back()->with("failed","Sudah pernah mengirim link!");
            }
        }
        
        return redirect()->back()->with("failed","Gagal mengirim link!");
    }
}
