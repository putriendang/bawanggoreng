<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
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

        $produk = Produk::all();

        return response()->json([
            'success' => true,
    
            'message' => 'Daftar data teman',
            'data' => $produk
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
            'nama_produk' => 'required|unique:produk|max:255',
            'harga_produk' => 'required|numeric',
            'varian_rasa' => 'required',
        ]);

        $produk = Produk::create([
            'nama_produk'=> $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'varian_rasa' => $request->varian_rasa
            

            ]);

            if($produk)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Produk berhasil di tambahkan',
                    'data' => $produk
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Produk gagal di tambahkan',
                'data' => $produk
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
                $produk = Produk ::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data produk',
                    'data' => $produk          
                       ], 200);
    }
    public function edit($id)
    {
                $produk = Produk::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data produk',
                    'data' => $produk
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
            'nama_produk' => 'required|unique:produk|max:255',
            'harga_produk' => 'required|numeric',
            'varian_rasa' => 'required',
        ]);*/
        $f = Produk::find($id)->update([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'varian_rasa' => $request->alamat
            
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $f
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
        $cek = Produk::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
