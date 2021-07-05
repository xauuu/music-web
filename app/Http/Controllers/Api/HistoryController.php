<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Favorite;
use App\Http\Resources\Song;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $check = History::where([
            'user_id' => $request->user_id,
            'song_id' => $request->song_id,
        ])->first();

        if ($check->exists) {
            $check->touch();
            return $check;
        }

        $history = new History();
        $history->user_id = $request->user_id;
        $history->song_id = $request->song_id;
        $history->save();

        return response()->json([
            'message' => 'Đã thêm vào lịch sử nghe nhạc'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (request()->has('limit')) {
            $history = History::where('user_id', $id)->orderby('updated_at', 'DESC')->limit(request()->limit)->get();
        } else {
            $history = History::where('user_id', $id)->orderby('updated_at', 'DESC')->get();
        }

        Favorite::withoutWrapping();
        return Favorite::collection($history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $history = History::where('user_id', $id)->delete();

        if ($history)
            return response()->json([
                'message' => 'Đã xoá lịch sử nghe nhạc'
            ]);
        else
            return response()->json([
                'message' => 'Deo xoá được'
            ]);
    }
}
