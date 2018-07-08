<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Peserta;
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
    public function destroy($id)
    {
        //
    }

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
        $peserta->update();
        // $peserta = dd($request->all());
        // $peserta = 1;
        return $peserta;
    }


    public function apiPeserta()
    {
        $peserta = Peserta::all()->where('konfirmasi_bayar','0');
 
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
        $peserta = Peserta::all()->where('konfirmasi_bayar','1')->where('workshop','1');
 
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
        $peserta = Peserta::all()->where('konfirmasi_bayar','1')->where('talkshow','1');
 
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
        $peserta = Peserta::all()->where('konfirmasi_bayar','1')->where('seminar','1');
 
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
}
