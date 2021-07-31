<?php

namespace App\Http\Controllers\Api;

use App\Models\Nama;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NamaController extends Controller
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

        $namapelanggan= Namapelanggan::all();

        return response()->json([
            'success' => true,
    
            'message' => 'Daftar data teman',
            'data' => $namapelanggan
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
        /**$request->validate([
            'nama_pelanggan' => 'required|unique:namapelanggan|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
        ]);*/

        $namapelanggan = Namapelanggan::create([
            'nama_pelanggan'=> $request->nama_pelanggan,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat
            

            ]);

            if($namapelanggan)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Pelanggan berhasil di tambahkan',
                    'data' => $namapelanggan
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Pelangggan gagal di tambahkan',
                'data' => $namapelanggan
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
                $namapelanggan = Namapelanggan ::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data Pelanggan',
                    'data' => $namapelanggan        
                       ], 200);
    }
    public function edit($id)
    {
                $namapelanggan = Namapelanggan::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data pelanggan',
                    'data' => $namapelanggan
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
            'nama_pelanggan' => 'required|unique:produk|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
        ]);*/
        $f = Produk::find($id)->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat
            
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $p
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
        $cek = Namapelanggan::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
