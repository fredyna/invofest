<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use LaravelQRCode\Facades\QRCode;
use App\Mail\Confirm\SendConfirm;
use App\Mail\Confirm\SendTiket;

use App\Peserta;
use App\Post;
use App\Sponsor;
use App\Media;
use App\Kompetisi;
use App\User;
use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Services\DataTable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'adc'   => $this->countADC(),
            'wdc'   => $this->countWDC(),
            'dpc'   => $this->countDPC(),
            'ws_uxd'   => $this->countUXD(),
            'ws_ds'    => $this->countDS(),
            'ws_cs'    => $this->countCS(),
            'ws_ws'    => $this->countWS(),
            'talkshow' => $this->countTalkshow(),
            'seminar'  => $this->countSeminar()
        ];
        return view('admin.pages.beranda')->with($data);
    }

    //count peserta kompetisi

    public function countADC()
    {
        $count = Kompetisi::all()->where('jenis_lomba','adc')->where('konfirmasi',true)->count();
        return $count;
    }

    public function countWDC()
    {
        $count = Kompetisi::all()->where('jenis_lomba','wdc')->where('konfirmasi',true)->count();
        return $count;
    }

    public function countDPC()
    {
        $count = Kompetisi::all()->where('jenis_lomba','dpc')->where('konfirmasi',true)->count();
        return $count;
    }

    //count peserta workshop

    public function countUXD()
    {
        $count = Peserta::all()->where('workshop', true)->where('kategori_workshop','UI/UX Design')->where('konfirmasi_bayar',true)->count();
        return $count;
    }

    public function countDS()
    {
        $count = Peserta::all()->where('workshop', true)->where('kategori_workshop','Data Science')->where('konfirmasi_bayar',true)->count();
        return $count;
    }

    public function countCS()
    {
        $count = Peserta::all()->where('workshop', true)->where('kategori_workshop','Cyber Security')->where('konfirmasi_bayar',true)->count();
        return $count;
    }

    public function countWS()
    {
        $count = Peserta::all()->where('workshop', true)->where('kategori_workshop','Web Services')->where('konfirmasi_bayar',true)->count();
        return $count;
    }

    //count acara lainnya

    public function countTalkshow()
    {
        $count = Peserta::all()->where('talkshow', true)->where('konfirmasi_bayar',true)->count();
        return $count;
    }

    public function countSeminar()
    {
        $count = Peserta::all()->where('seminar', true)->where('konfirmasi_bayar',true)->count();
        return $count;
    }

    public function inbox()
    {
        return view('admin.pages.inbox');
    }

    public function workshop()
    {
        return view('admin.pages.workshop');
    }
    public function seminar()
    {
        return view('admin.pages.seminar');
    }

    public function talkshow()
    {
        return view('admin.pages.talkshow');
    }

    public function adc()
    {
        return view('admin.pages.adc');
    }

    public function wdc()
    {
        return view('admin.pages.wdc');
    }

    public function dc()
    {
        return view('admin.pages.dc');
    }


    public function kompetisi()
    {
        return view('admin.pages.kompetisi_inbox');
    }

    public function post()
    {
        return view('admin.pages.post');
    }

    public function sponsor()
    {
        return view('admin.pages.sponsor');
    }

    public function media()
    {
        return view('admin.pages.media');
    }

    // absensi

    public function absensi()
    {
        return view('admin.pages.media');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function postStore(Request $request)
    {
        $input = Input::all();
        $file = array('gambar'=> Input::file('gambar'));

        if (Input::file('gambar')->isValid()) {
            $destinationPath = 'gambarpost';
            $extension = Input::file('gambar')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            Input::file('gambar')->move($destinationPath,$fileName) ;
            $input['gambar']= $destinationPath.'/'.$fileName;
            
            $insert = new Post;
            $insert->judul = $input['judul'];
            $insert->gambar = $input['gambar'];
            $insert->deskripsi = $input['deskripsi'];
            $insert->save();
            return $insert;
        }
        

 
    }

    public function sponsorStore(Request $request)
    {
        $input = Input::all();
        $file = array('logo'=> Input::file('logo'));

        if (Input::file('logo')) {
            $destinationPath = 'gambarsponsor';
            $extension = Input::file('logo')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            Input::file('logo')->move($destinationPath,$fileName) ;
            $input['logo']= $destinationPath.'/'.$fileName;
            
            $insert = new Sponsor;
            $insert->nama = $input['nama'];
            $insert->link = $input['link'];
            $insert->logo = $input['logo'];
            $insert->deskripsi = $input['deskripsi'];
            $insert->save();
            return $insert;
        }
        

 
    }

    public function mediaStore(Request $request)
    {
        $input = Input::all();
        $file = array('logo'=> Input::file('logo'));

        if (Input::file('logo')) {
            $destinationPath = 'gambarmedia';
            $extension = Input::file('logo')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            Input::file('logo')->move($destinationPath,$fileName) ;
            $input['logo']= $destinationPath.'/'.$fileName;
            
            $insert = new Media;
            $insert->nama = $input['nama'];
            $insert->link = $input['link'];
            $insert->logo = $input['logo'];
            $insert->deskripsi = $input['deskripsi'];
            $insert->save();
            return $insert;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return $peserta;
    }

    public function kompetisiEdit($id)
    {
        $kompetisi = Kompetisi::findOrFail($id);
        return $kompetisi;
    }

    public function postEdit($id)
    {
        $peserta = Post::findOrFail($id);
        $peserta->gambar = asset($peserta->gambar);
        return $peserta;
    }

    public function sponsorEdit($id)
    {
        $peserta = Sponsor::findOrFail($id);
        $peserta->logo = asset($peserta->logo);
        return $peserta;
    }

    public function mediaEdit($id)
    {
        $media = Media::findOrFail($id);
        $media->logo = asset($media->logo);
        return $media;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function konfirmasi(Request $request , $id)
    {
        // $id = $request->id_peserta;
        $peserta = Peserta::findOrFail($id);
        
        $peserta->konfirmasi_bayar = '1';
        $peserta->jenis_pembayaran = $request->jenis_pembayaran;
        // $peserta->update();


        if($peserta->update()){
            //send email confirm to competitor
            $this->sendTiket($peserta->id_peserta);

            //return statement
            return $peserta;
        }

        // return view('admin.pages.inbox')->with("Konfirmasi gagal!");
        // $peserta = dd($request->all());
        // $peserta = 1;
        // return $peserta;
    }

    public function updateWorkshop(Request $request , $id)
    {
        // $id = $request->id_peserta;
        $peserta = Peserta::findOrFail($id);
        $peserta->nama = $request->nama;
        $peserta->asal_institusi = $request->asal_institusi;
        $peserta->nomor_hp = $request->nomor_hp;
        $peserta->email = $request->email;
        $peserta->kategori = $request->kategori;
        $peserta->kategori_workshop = $request->kategori_workshop;
        $peserta->jenis_pembayaran = $request->jenis_pembayaran;

        // $peserta->workshop = $request->workshop;
        // $peserta->talkshow = $request->talkshow;
        // $peserta->seminar = $request->seminar;
        // $peserta->update();
        // $peserta = dd($request->all());
        // $peserta = 1;
        return $peserta;
    }

    public function updatePost(Request $request , $id)
    {
        // $id = $request->id_peserta;
        $input = Input::all();
        $file = array('gambar'=> Input::file('gambar'));
        $insert = Post::findOrFail($id);
        if (Input::file('gambar') != "") {
            $destinationPath = 'gambarpost';
            $extension = Input::file('gambar')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            Input::file('gambar')->move($destinationPath,$fileName) ;
            $input['gambar']= $destinationPath.'/'.$fileName;
            $insert->gambar = $input['gambar'];            
        }
            $insert->judul = $input['judul'];
            $insert->deskripsi = $input['deskripsi'];
            $insert->update();
            return $insert;
    }

    public function updateSponsor(Request $request , $id)
    {
        // $id = $request->id_peserta;
        $input = Input::all();
        $file = array('logo'=> Input::file('logo'));
        $insert = Sponsor::findOrFail($id);
        if (Input::file('logo') != "") {
            $destinationPath = 'gambarsponsor';
            $extension = Input::file('logo')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            Input::file('logo')->move($destinationPath,$fileName) ;
            $input['logo']= $destinationPath.'/'.$fileName;
            $insert->logo = $input['logo'];            
        }
            $insert->nama = $input['nama'];
            $insert->link = $input['link'];
            $insert->deskripsi = $input['deskripsi'];
            $insert->update();
            return $insert;
    }

    public function updateMedia(Request $request , $id)
    {
        $media = Media::findOrFail($id);
        $input = Input::all();
        $file = array('logo'=> Input::file('logo'));
        $insert = Media::findOrFail($id);
        if (Input::file('logo') != "") {
            //hapus logo lama
            File::delete($media->logo);
            $destinationPath = 'gambarmedia';
            $extension = Input::file('logo')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            Input::file('logo')->move($destinationPath,$fileName) ;
            $input['logo']= $destinationPath.'/'.$fileName;
            $insert->logo = $input['logo'];            
        }
            $insert->nama = $input['nama'];
            $insert->link = $input['link'];
            $insert->deskripsi = $input['deskripsi'];
            $insert->update();
            return $insert;
    }

    public function destroy($id)
    {
        //
    }

    public function destroyPost($id)
    {
        $post = Post::findOrFail($id);
        $post->hapus = '1';
        $post->update();
        return $post;
    }

    

    public function destroySponsor($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        //hapus gambar dari penyimpanan
        File::delete($sponsor->logo);
        $sponsor->delete();
        return $sponsor;
    }

    public function destroyMedia($id)
    {
        $media = Media::findOrFail($id);
        //hapus gambar dari penyimpanan
        File::delete($media->logo);
        $media->delete();
        return $media;
    }


    public function apiPeserta()
    {
        $peserta = Peserta::all()->where('hapus','0')->where('konfirmasi_bayar','0');
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="konfirmForm(\''. $peserta->id_peserta .'\')" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Lihat</a> ';
        })
        ->editColumn('seminar', function($peserta){
            if($peserta->seminar == '1'){
                
                return '<a class="label label-success">Yes</a>';
            }else{
                return '<a class="label label-danger">Tidak</a> ';
            }
        })
        ->editColumn('workshop', function($peserta){
            if($peserta->workshop == '1'){
                
                return '<a class="label label-success">Yes</a>';
            }else{
                return '<a class="label label-danger">Tidak</a> ';
            }
        })->editColumn('kategori', function($peserta){
            if($peserta->kategori == 'Umum'){
                
                return '<a  class="label label-info">Umum</a>';
            }else{
                return '<a class="label label-warning">Mahasiswa</a> ';
            }
        })
        ->editColumn('talkshow', function($peserta){
            if($peserta->talkshow == '1'){
                
                return '<a class="label label-success">Yes</a>';
            }else{
                return '<a class="label label-danger">Tidak</a> ';
            }
        })
        ->rawColumns(['seminar','action','talkshow','workshop','kategori'])
        ->make(true);
    }

    public function apiWorkshop()
    {
        $peserta = Peserta::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('workshop','1');
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="detailForm(\''. $peserta->id_peserta .'\')" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detail</a> ';
        })
        ->addColumn('absensi', function($peserta){
            if($peserta->validasi_workshop == 0 ){
                return '<a onclick="absensiForm(\''. $peserta->id_peserta .'\')" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Belum Hadir</a> ';
            }else{
                return '<a  class="btn btn-sm btn-success"><i class="fa fa-check"></i> Hadir</a> ';

            }
        })
        ->editColumn('kategori', function($peserta){
            if($peserta->kategori == 'Umum'){
                
                return '<a  class="label label-info">Umum</a>';
            }else{
                return '<a class="label label-warning">Mahasiswa</a> ';
            }
        })
        ->editColumn('kategori_workshop', function($peserta){
            if($peserta->kategori_workshop == 'UI/UX Design'){
                
                return '<a  class="label bg-maroon">UI/UX Design</a>';
            }elseif ($peserta->kategori_workshop == 'Data Science'){
                return '<a class="label bg-navy">Data Science</a> ';
            }elseif ($peserta->kategori_workshop == 'Cyber Security'){
                return '<a class="label bg-olive">Cyber Security</a> ';
            }else{
                return '<a class="label bg-purple">Web Services</a> ';
            }
        })
        ->rawColumns(['action','kategori','kategori_workshop','absensi'])
        ->make(true);
    }

    public function absensiWorkshop($id)
    {
        $post = Peserta::findOrFail($id);
        $post->validasi_workshop = '1';
        $post->update();
        return $post;
    }

    public function apiTalkshow()
    {
        $peserta = Peserta::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('talkshow','1');
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="absensiForm(\''. $peserta->id_peserta .'\')" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detail</a> ';
        })
        ->addColumn('absensi', function($peserta){
            if($peserta->validasi_talkshow == 0 ){
                return '<a onclick="absensiForm(\''. $peserta->id_peserta .'\')" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Belum Hadir</a> ';
            }else{
                return '<a  class="btn btn-sm btn-success"><i class="fa fa-check"></i> Hadir</a> ';

            }
        })
        ->editColumn('kategori', function($peserta){
            if($peserta->kategori == 'Umum'){
                
                return '<a  class="label label-info">Umum</a>';
            }else{
                return '<a class="label label-warning">Mahasiswa</a> ';
            }
        })
        ->rawColumns(['action','kategori','absensi'])
        ->make(true);
    }

    public function absensiTalkshow($id)
    {
        $post = Peserta::findOrFail($id);
        $post->validasi_talkshow = '1';
        $post->update();
        return $post;
    }

    public function apiSeminar()
    {
        $peserta = Peserta::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('seminar','1');
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="detailForm(\''. $peserta->id_peserta .'\')" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detail</a> ';
        })->addColumn('absensi', function($peserta){
            if($peserta->validasi_seminar == 0 ){
                return '<a onclick="absensiForm(\''. $peserta->id_peserta .'\')" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Belum Hadir</a> ';
            }else{
                return '<a  class="btn btn-sm btn-success"><i class="fa fa-check"></i> Hadir</a> ';

            }
        })
        ->editColumn('kategori', function($peserta){
            if($peserta->kategori == 'Umum'){
                
                return '<a  class="label label-info">Umum</a>';
            }else{
                return '<a class="label label-warning">Mahasiswa</a> ';
            }
        })
        ->rawColumns(['action','kategori','kategori','absensi'])
        ->make(true);
    }

    public function absensiSeminar($id)
    {
        $post = Peserta::findOrFail($id);
        $post->validasi_seminar = '1';
        $post->update();
        return $post;
    }


    public function apiKompetisi()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi','0');
 
        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            return '<a onclick="lihatData(\''. $kompetisi->id .'\')" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat</a> ';
        })
        ->addColumn('nama_tim', function($kompetisi){
            return $kompetisi->user->name;
        })
        ->addColumn('email_tim', function($kompetisi){
            return $kompetisi->user->email;
        })
        ->addColumn('tgl_registrasi', function($kompetisi){
            return date('d-m-Y', strtotime($kompetisi->created_at));
        })
        ->editColumn('berkas_konfirmasi', function($kompetisi){
            if($kompetisi->berkas_konfirmasi != null)
            {
                $url = asset('storage/berkas_konfirmasi/'.$kompetisi->berkas_konfirmasi);
                return '<a href="'.$url.'" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Download</a>';
            } 

            return '<a href="javascript:void(0)" class="btn btn- btn-xs disabled"><i>Belum Upload</i></a>';
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            if($kompetisi->jenis_lomba == 'adc'){
                return '<a class="label bg-navy">ADC</a>';
            }elseif ($kompetisi->jenis_lomba == 'wdc'){
                return '<a class="label bg-maroon">WDC</a> ';
            }else{
                return '<a class="label bg-purple">DC</a> ';
            }
        })
        ->rawColumns(['action','jenis_lomba','berkas_konfirmasi'])
        ->make(true);
    }

    public function apiKompetisiById($id)
    {
        $kompetisi = Kompetisi::findOrFail($id);
        $kompetisi['nama_tim'] = $kompetisi->user->name;
        return json_encode($kompetisi);
    }

    public function konfirmasiKompetisi(Request $request)
    {
        $id = $request->id;
        $kompetisi = Kompetisi::find($id);
        $data = [
            'konfirmasi' => true
        ];
        if($kompetisi->update($data)){
            //send email confirm to competitor
            $this->sendConfirmEmail($kompetisi->user->id);

            //return statement
            return redirect('/admin/kompetisi')->withSuccess("Konfirmasi Sukses! Tim yang dikonfirmasi telah masuk dalam daftar peserta sesuai jenis lomba yang diikuti.");
        }

        // return view('admin.pages.kompetisi_inbox')->with("Konfirmasi gagal!");
    }

    /**
     * method sendConfirmEmail($param)
     * 
     * this is used sending confirm email to competitor
     */
    public function sendConfirmEmail($id)
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new SendConfirm($user));
    }

    public function sendTiket($id)
    {
        $peserta = Peserta::find($id);
        $path = public_path('uploads/qrcode/');
        $path_send = $path . $id . '.png';
        QRCode::text($id)->setOutfile($path_send)->png(); 
        Mail::to($peserta->email)->send(new SendTiket($peserta));    
        // echo $path_send;
    }

    public function apiAdc()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi','1')->where('jenis_lomba','adc');

        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            return '<a onclick="lihatData(\''. $kompetisi->id .'\')" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat</a> ';
        })
        ->addColumn('nama_tim', function($kompetisi){
            return $kompetisi->user->name;
        })
        ->addColumn('email_tim', function($kompetisi){
            return $kompetisi->user->email;
        })
        ->editColumn('link_berkas', function($kompetisi){
            if($kompetisi->link_berkas != null)
            {
                $url = $kompetisi->link_berkas;
                return '<a href="'.$url.'" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Download</a>';
            } 

            return '<a href="javascript:void(0)" class="btn btn- btn-xs disabled"><i>Belum Upload</i></a>';
        })
        ->editColumn('link_app', function($kompetisi){
            if($kompetisi->link_app != null)
            {
                $url = $kompetisi->link_app;
                return '<a href="'.$url.'" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Download</a>';
            } 

            return '<a href="javascript:void(0)" class="btn btn- btn-xs disabled"><i>Belum Upload</i></a>';
        })
        ->editColumn('link_video', function($kompetisi){
            if($kompetisi->link_video != null)
            {
                $url = $kompetisi->link_video;
                return '<a href="'.$url.'" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Download</a>';
            } 

            return '<a href="javascript:void(0)" class="btn btn- btn-xs disabled"><i>Belum Upload</i></a>';
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            return '<a class="label bg-navy">ADC</a>';
        })
        ->rawColumns(['action','jenis_lomba','link_berkas','link_app','link_video'])
        ->make(true);
    }

    public function apiDc()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi','1')->where('jenis_lomba','dpc');
 
        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            return '<a onclick="lihatData(\''. $kompetisi->id .'\')" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat</a> ';
        })
        ->addColumn('nama_tim', function($kompetisi){
            return $kompetisi->user->name;
        })
        ->addColumn('email_tim', function($kompetisi){
            return $kompetisi->user->email;
        })
        ->editColumn('berkas_konfirmasi', function($kompetisi){
            if($kompetisi->berkas_konfirmasi != null)
            {
                $url = asset('storage/berkas_konfirmasi/'.$kompetisi->berkas_konfirmasi);
                return '<a href="'.$url.'" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Download</a>';
            } 

            return '<a href="javascript:void(0)" class="btn btn- btn-xs disabled"><i>Belum Upload</i></a>';
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            return '<a class="label bg-purple">DC</a>';
        })
        ->rawColumns(['action','jenis_lomba','berkas_konfirmasi'])
        ->make(true);
    }

    public function apiWdc()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi','1')->where('jenis_lomba','wdc');
 
        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            return '<a onclick="lihatData(\''. $kompetisi->id .'\')" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat</a> ';
        })
        ->addColumn('nama_tim', function($kompetisi){
            return $kompetisi->user->name;
        })
        ->addColumn('email_tim', function($kompetisi){
            return $kompetisi->user->email;
        })
        ->editColumn('link_berkas', function($kompetisi){
            if($kompetisi->link_berkas != null)
            {
                $url = $kompetisi->link_berkas;
                return '<a href="'.$url.'" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Download</a>';
            } 

            return '<a href="javascript:void(0)" class="btn btn- btn-xs disabled"><i>Belum Upload</i></a>';
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            return '<a class="label bg-maroon">WDC</a>';
        })
        ->rawColumns(['action','jenis_lomba','link_berkas'])
        ->make(true);
    }

    public function apiPost()
    {
        $post = Post::all()->where('hapus','0');
        

        return Datatables::of($post)
        ->addColumn('action', function($post){
            return '<a onclick="editForm('. $post->id .')" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a onclick="deleteForm('. $post->id .')" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';
        })
        ->editColumn('gambar', function($post){
            $link = asset($post->gambar);
            $gambar = '<image src="'. $link .'" width="80px">';    
            return $gambar;
        })
        ->editColumn('deskripsi', function($post){
            $desc = str_limit($post->deskripsi, 100);    
            return $desc;
        })
        ->rawColumns(['action','deskripsi','gambar'])
        ->make(true);
    }

    public function apiSponsor()
    {
        $sponsor = Sponsor::all()->where('hapus','0');
        

        return Datatables::of($sponsor)
        ->addColumn('action', function($sponsor){
            return '<a onclick="editForm('. $sponsor->id .')" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a onclick="deleteForm('. $sponsor->id .')" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';
        })
        ->editColumn('logo', function($sponsor){
            $link = asset($sponsor->logo);
            $gambar = '<image src="'. $link .'" width="80px">';    
            return $gambar;
        })
        ->rawColumns(['action','deskripsi','logo'])
        ->make(true);
    }

    public function apiMedia()
    {
        $media = Media::all()->where('hapus','0');
        

        return Datatables::of($media)
        ->addColumn('action', function($media){
            return '<a onclick="editForm('. $media->id .')" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a onclick="deleteForm('. $media->id .')" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';
        })
        ->editColumn('logo', function($media){
            $link = asset($media->logo);
            $gambar = '<image src="'. $link .'" width="80px">';    
            return $gambar;
        })
        ->rawColumns(['action','logo'])
        ->make(true);
    }

    public function apiCount(){
        $hitung['kompetisi'] = Kompetisi::all()->where('konfirmasi_bayar','0')->where('hapus','0')->count();
        $hitung['peserta'] = Peserta::all()->where('konfirmasi_bayar','0')->where('hapus','0')->count();
        return $hitung;
    }
}
