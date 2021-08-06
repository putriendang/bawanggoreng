<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$history = History::latest()->paginate(10);
	return view('history.index', compact('history'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('history.create');
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
	'jenjangpendidikan' => 'required',
	'tgl_masuk' => 'required',
	'tgl_lulus' => 'required'
	]);
	
	$history = History::create([
	'nama' => $request->nama,
	'jenjangpendidikan' => $request->jenjangpendidikan,
	'tgl_masuk' => $request->tgl_masuk,
	'tgl_lulus' => $request->tgl_lulus
	]);
	
	if($history){
	//redirect dengan pesan sukses
	return redirect()->route('history.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('history.index')->with(['error' => 'Data Gagal Disimpan!']);
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
	public function edit(history $history)
	{
	return view('history.edit', compact('history'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, history $history)
	{
	$this->validate($request, [
		'nama' => 'required',
		'jenjangpendidikan' => 'required',
		'tgl_masuk' => 'required',
		'tgl_lulus' => 'required'
	]);
	
	$history->update([
		'nama' => $request->nama,
		'jenjangpendidikan' => $request->jenjangpendidikan,
		'tgl_masuk' => $request->tgl_masuk,
		'tgl_lulus' => $request->tgl_lulus
	]);
	
	if($history) {
	//redirect dengan pesan sukses
	return redirect()->route('history.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('history.index')->with(['error' => 'Data Gagal Diupdate!']);
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
	
	$history = History::findOrFail($id);
	
	if($history){
	//redirect dengan pesan sukses
	return redirect()->route('history.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('history.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}