<?php

namespace App\Http\Controllers\Api;

use App\Models\Historys;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historys = Historys::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar History',
            'data' => $historys
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:historys|max:255',
            'jenjangpendidikan' => 'required',
		    'tgl_masuk' => 'required',
		    'tgl_lulus' => 'required'
        ]);

        $historys = Historys::create([
            'name'=> $request->name,
            'jenjangpendidikan' => $request->jenjangpendidikan,
		    'tgl_masuk' => $request->tgl_masuk,
		    'tgl_lulus' => $request->tgl_lulus
            ]);

            if($historys)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'historys berhasil di tambahkan',
                    'data' => $historys
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'historys gagal di tambahkan',
                'data' => $historys
            ], 409);
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
        $history = Historys::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail historys',
            'data' => $history
        ], 200);
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
        $request->validate([
            'name' => 'required|unique:historys|max:255',
            'jenjangpendidikan' => 'required',
            'tgl_masuk' => 'required',
            'tgl_lulus' => 'required'
        ]);

        $h = Historys::find($id)->update([
            'name' => $request->name,
            'jenjangpendidikan' => $request->jenjangpendidikan,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_lulus' => $request->tgl_lulus
        ]);

        return response()->json([
            'success' => true,
            'message' => 'historys Updated',
            'data' => $h
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Historys::find($id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'historys Deleted',
            'data' => $cek
        ], 200);
    }
}
