<?php

namespace App\Http\Controllers\Api;

use App\Models\Bios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BioController extends Controller
{
    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $bios = Bios::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Biodata',
            'data' => $bios
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
            'nama' => 'required|unique:bios|max:255',
            'no_tlp' => 'required|numeric',
            'tgl_lahir' => 'required',
            'alamat' => 'required'
        ]);

        $bios = Bios::create([
            'nama'=> $request->nama,
            'no_tlp' => $request->no_tlp,
            'tgl_lahir' => $required->tgl_lahir,
            'alamat' => $request->alamat
            

            ]);

            if($bios)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Biodata berhasil di tambahkan',
                    'data' => $bios
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Biodata gagal di tambahkan',
                'data' => $bios
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
                $bio = Bios::where('id', $id)->get();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data teman',
                    'data' => $bio
                ], 200);
    }
    public function edit($id)
    {
                $bio = Bios::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data teman',
                    'data' => $bio
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
        /*$request->validate([
            'nama' => 'required|unique:bios|max:255',
            'no_tlp' => 'required|numeric',
            'tgl_lahir' => 'required,
            'alamat' => 'required'
        ]);*/
        $b = Bios::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat
            
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $b
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
        $cek = Bios::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
