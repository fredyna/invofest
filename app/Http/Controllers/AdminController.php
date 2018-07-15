<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Peserta;
use App\Post;
use App\Sponsor;
use App\Kompetisi;
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
        return view('admin.pages.beranda');
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
        $peserta->update();
        // $peserta = dd($request->all());
        // $peserta = 1;
        return $peserta;
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
        $sponsor->hapus = '1';
        $sponsor->update();
        return $sponsor;

    }


    public function apiPeserta()
    {
        $peserta = Peserta::all()->where('hapus','0')->where('konfirmasi_bayar','0');
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="konfirmForm('. $peserta->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
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
            if($peserta->kategori == 'umum'){
                
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
            return '<a onclick="detailForm('. $peserta->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Detail</a> ';
        })
        ->editColumn('kategori', function($peserta){
            if($peserta->kategori == 'umum'){
                
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
        ->rawColumns(['action','kategori','kategori_workshop'])
        ->make(true);
    }

    public function apiTalkshow()
    {
        $peserta = Peserta::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('talkshow','1');
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="detailForm('. $peserta->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Detail</a> ';
        })
        ->editColumn('kategori', function($peserta){
            if($peserta->kategori == 'umum'){
                
                return '<a  class="label label-info">Umum</a>';
            }else{
                return '<a class="label label-warning">Mahasiswa</a> ';
            }
        })
        ->rawColumns(['action','kategori'])
        ->make(true);
    }

    public function apiSeminar()
    {
        $peserta = Peserta::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('seminar','1');
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="detailForm('. $peserta->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Detail</a> ';
        })
        ->editColumn('kategori', function($peserta){
            if($peserta->kategori == 'umum'){
                
                return '<a  class="label label-info">Umum</a>';
            }else{
                return '<a class="label label-warning">Mahasiswa</a> ';
            }
        })
        ->rawColumns(['action','kategori'])
        ->make(true);
    }


    public function apiKompetisi()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi_bayar','0');
 
        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            // return '<a onclick="konfirmForm('. $kompetisi->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
            return '<a onclick="addForm()" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
        })
        ->addColumn('nama_tim', function($kompetisi){
            return $kompetisi->User->name;
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            if($kompetisi->jenis_lomba == 'ADC'){
                return '<a class="label bg-maroon">ADC</a>';
            }elseif ($kompetisi->jenis_lomba == 'WDC'){
                return '<a class="label bg-navy">WDC</a> ';
            }else{
                return '<a class="label bg-purple">DC</a> ';
            }
        })
        ->rawColumns(['action','jenis_lomba'])
        ->make(true);
    }

    public function apiAdc()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('jenis_lomba','ADC');
 
        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            // return '<a onclick="konfirmForm('. $kompetisi->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
            return '<a onclick="addForm()" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
        })
        ->addColumn('nama_tim', function($kompetisi){
            return $kompetisi->User->name;
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            if($kompetisi->jenis_lomba == 'ADC'){
                return '<a class="label bg-maroon">ADC</a>';
            }elseif ($kompetisi->jenis_lomba == 'WDC'){
                return '<a class="label bg-navy">WDC</a> ';
            }else{
                return '<a class="label bg-purple">DC</a> ';
            }
        })
        ->rawColumns(['action','jenis_lomba'])
        ->make(true);
    }

    public function apiDc()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('jenis_lomba','DC');
 
        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            // return '<a onclick="konfirmForm('. $kompetisi->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
            return '<a onclick="addForm()" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            if($kompetisi->jenis_lomba == 'ADC'){
                return '<a class="label bg-maroon">ADC</a>';
            }elseif ($kompetisi->jenis_lomba == 'WDC'){
                return '<a class="label bg-navy">WDC</a> ';
            }else{
                return '<a class="label bg-purple">DC</a> ';
            }
        })
        ->rawColumns(['action','jenis_lomba'])
        ->make(true);
    }

    public function apiWdc()
    {
        $kompetisi = Kompetisi::all()->where('hapus','0')->where('konfirmasi_bayar','1')->where('jenis_lomba','WDC');
 
        return Datatables::of($kompetisi)
        ->addColumn('action', function($kompetisi){
            // return '<a onclick="konfirmForm('. $kompetisi->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
            return '<a onclick="addForm()" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
        })
        ->addColumn('nama_tim', function($kompetisi){
            return $kompetisi->User->name;
        })
        ->editColumn('jenis_lomba', function($kompetisi){
            if($kompetisi->jenis_lomba == 'ADC'){
                return '<a class="label bg-maroon">ADC</a>';
            }elseif ($kompetisi->jenis_lomba == 'WDC'){
                return '<a class="label bg-navy">WDC</a> ';
            }else{
                return '<a class="label bg-purple">DC</a> ';
            }
        })
        ->rawColumns(['action','jenis_lomba'])
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

    public function apiCount(){
        $hitung['kompetisi'] = Kompetisi::all()->where('konfirmasi_bayar','0')->where('hapus','0')->count();
        $hitung['peserta'] = Peserta::all()->where('konfirmasi_bayar','0')->where('hapus','0')->count();
        return $hitung;
    }
}
