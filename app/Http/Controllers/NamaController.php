<?php

namespace App\Http\Controllers;

use App\Models\Namapelanggan;
use Illuminate\Http\Request;

class NamaController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$namapelanggan = Namapelanggan::latest()->paginate(10);
	return view('namapelanggan.index', compact('namapelanggan'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('namapelanggan.create');
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

	'nama_pelanggan' => 'required',
	'no_tlp' => 'required',
	'alamat' => 'required'
	]);
	
	$namapelanggan = Namapelanggan::create([
	'nama_pelanggan' => $request->nama_pelanggan,
	'no_tlp' => $request->no_tlp,
	'alamat' => $request->alamat
	]);
	
	if($namapelanggan){
	//redirect dengan pesan sukses
	return redirect()->route('namapelanggan.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('namapelanggan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
	public function edit(Namapelanggan $namapelanggan)
	{
	return view('namapelanggan.edit', compact('namapelanggan'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, namapelanggan $namapelanggan)
	{
	$this->validate($request, [
    'nama_pelanggan' => 'required',
    'no_tlp' => 'required',
	'alamat' => 'required'
	]);
	
	$produk->update([
    'nama_pelanggan' => $request->nama_pelanggan,
    'no_tlp' => $request->no_tlp,
    'alamat' =>$request->alamat
	]);
	
	if($namapelanggan) {
	//redirect dengan pesan sukses
	return redirect()->route('namapelanggan.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('namapelanggan.index')->with(['error' => 'Data Gagal Diupdate!']);
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
	
	$namapelanggan = Namapelanggan::findOrFail($id);
	
	if($namapelanggan){
	//redirect dengan pesan sukses
	return redirect()->route('namapelanggan.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('namapelanggan.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}