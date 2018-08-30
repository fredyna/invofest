<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UmumController extends Controller
{
    public function showBeranda()
    {
        $post       = DB::table('posts')->where('hapus',0)
                                    ->orderBy('updated_at','desc')
                                    ->offset(0)
                                    ->limit(5)
                                    ->get();
        $sponsor    = DB::table('sponsors')->get();
        $media    = DB::table('medias')->get();
        $data   = [
            'post'      => $post,
            'sponsor'   => $sponsor,
            'media'     => $media
        ];
        return view('umum.beranda')->with($data);
    }

    public function showWorkshop()
    {
        $sponsor    = DB::table('sponsors')->get();
        $media    = DB::table('medias')->get();
        $data = [
            'sponsor' => $sponsor,
            'media'   => $media
        ];
        return view('umum.workshop.workshop')->with($data);
    }

    public function showCompetition()
    {
        $sponsor    = DB::table('sponsors')->get();
        $media      = DB::table('medias')->get();
        $data = [
            'sponsor' => $sponsor,
            'media'   => $media
        ];
        return view('umum.competition.itcompetition')->with($data);
    }

    public function showTalkshow()
    {
        return view('umum.talkshow.talkshow');
    }

    public function showSeminar()
    {
        return view('umum.seminar.seminar');
    }

    public function showJadwal()
    {
        return view('umum.timeline');
    }

    public function showNews($offset=0)
    {
        $real_offset = $offset * 6;
        $post   = DB::table('posts')->where('hapus',0)
                                    ->orderBy('updated_at','desc')
                                    ->offset($real_offset)
                                    ->limit(6)
                                    ->get();
        $count_post = DB::table('posts')->count();
        $max_offset = floor($count_post / 6 );
        $sponsor    = DB::table('sponsors')->get();
        $data   = [
            'offset'    => $offset,
            'post'      => $post,
            'count_post'=> $count_post,
            'max_offset'=> $max_offset,
            'sponsor'   => $sponsor
        ];
        return view('umum.news.news')->with($data);
    }

    public function showNewsById(Request $request)
    {
        $post = DB::table('posts')->where('id', $request->id)->first();
        $data = [
            'post'  => $post
        ];
        return view('umum.news.detail_news')->with($data);
    }
}
