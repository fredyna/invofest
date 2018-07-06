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


    public function apiPeserta()
    {
        $peserta = Peserta::all();
 
        return Datatables::of($peserta)
        ->addColumn('action', function($peserta){
            return '<a onclick="editForm('. $peserta->id_peserta .')" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</a> ';
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
        })
        ->editColumn('talkshow', function($peserta){
            if($peserta->talkshow == '1'){
                
                return '<a onClick="addForm()" class="label label-success">Yes</a>';
            }else{
                return '<a class="label label-danger">Tidak</a> ';
            }
        })
        ->rawColumns(['seminar','action','talkshow','workshop'])
        ->make(true);
    }
}
