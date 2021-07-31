<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$produk = Produk::latest()->paginate(10);
	return view('produk.index', compact('produk'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('produk.create');
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
	$this->validate($request, [

	'nama_produk' => 'required',
	'harga_produk' => 'required',
	'varian_rasa' => 'required'
	]);
	
	$produk = Produk::create([
	'nama_produk' => $request->nama_produk,
	'harga_produk' => $request->harga_produk,
	'varian_rasa' => $request->varian_rasa
	]);
	
	if($produk){
	//redirect dengan pesan sukses
	return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('produk.index')->with(['error' => 'Data Gagal Disimpan!']);
	}
	}
	
	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
	//
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function edit(Produk $produk)
	{
	return view('produk.edit', compact('produk'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, produk $produk)
	{
	$this->validate($request, [
    'nama_produk' => 'required',
    'harga_produk' => 'required',
	'varian_rasa' => 'required'
	]);
	
	$produk->update([
    'nama_produk' => $request->nama_produk,
    'harga_produk' => $request->harga_produk,
    'varian_rasa' =>$request->varian_rasa
	]);
	
	if($produk) {
	//redirect dengan pesan sukses
	return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('produk.index')->with(['error' => 'Data Gagal Diupdate!']);
	}
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
	
	$produk = Produk::findOrFail($id);
	
	if($produk){
	//redirect dengan pesan sukses
	return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('produk.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}