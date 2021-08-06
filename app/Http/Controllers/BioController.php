<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use Illuminate\Http\Request;

class BioController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$bio = Bio::latest()->paginate(10);
	return view('bio.index', compact('bio'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('bio.create');
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

	'nama' => 'required',
	'no_tlp' => 'required',
	'tgl_lahir' => 'required',
	'alamat' => 'required'
	]);
	
	$bio = Bio::create([
	'nama' => $request->nama,
	'no_tlp' => $request->no_tlp,
	'tgl_lahir' => $request->tgl_lahir,
	'alamat' => $request->alamat
	]);
	
	if($bio){
	//redirect dengan pesan sukses
	return redirect()->route('bio.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('bio.index')->with(['error' => 'Data Gagal Disimpan!']);
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
	public function edit(bio $bio)
	{
	return view('bio.edit', compact('bio'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, bio $bio)
	{
	$this->validate($request, [
    'nama' => 'required',
	'no_tlp' => 'required',
	'tgl_lahir' => 'required',
	'alamat' => 'required'
	]);
	
	$bio->update([
    'nama' => $request->nama,
	'no_tlp' => $request->no_tlp,
	'tgl_lahir' =>  $request->tgl_lahir,
    'alamat' =>$request->alamat
	]);
	
	if($bio) {
	//redirect dengan pesan sukses
	return redirect()->route('bio.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('bio.index')->with(['error' => 'Data Gagal Diupdate!']);
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
	
	$bio = Bio::findOrFail($id);
	
	if($bio){
	//redirect dengan pesan sukses
	return redirect()->route('bio.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('bio.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}