<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::orderBy('name', 'asc')->get();
        return view('admin.pages.ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::OrderBy('name', 'asc')->get();
        return view('admin.pages.ruangan.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $this->validate($request, [
            'sekolah_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'jumlah' => 'required|integer|max:10',
        ]);

        if (Ruangan::create($params)) {
            toast('Data Ruangan berhasil ditambahkan!', 'success');
            return redirect()->route('ruangan.index');
        }
        return redirect()->route('ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = Sekolah::orderBy('name', 'asc')->get();
        $ruangan = Ruangan::findOrFail($id);

        return view('admin.pages.ruangan.edit', compact('sekolah', 'ruangan'));
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
        $params = $this->validate($request, [
            'sekolah_id' => 'required|integer',
            'name' => 'required|string|unique:desa,name',
            'jumlah' => 'required|integer|max:10',
        ]);

        $ruangan = Ruangan::findOrFail($id);

        if ($ruangan->update($params)) {
            toast('Data Ruangan berhasil diubah!', 'success');
            return redirect()->route('ruangan.index');
        }
        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        if ($ruangan->delete()) {
            toast('Data ruangan berhasil dihapus!', 'success');
        }

        return redirect()->route('ruangan.index');
    }
}
