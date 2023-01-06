<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderBy('name', 'asc')->get();
        return view('admin.pages.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::OrderBy('name', 'asc')->get();
        return view('admin.pages.siswa.create', compact('sekolah'));
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
            'kelamin' => 'required'
        ]);

        if (Siswa::create($params)) {
            toast('Data Siswa berhasil ditambahkan!', 'success');
            return redirect()->route('siswa.index');
        }
        return redirect()->route('siswa.index');
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
        $siswa = Siswa::findOrFail($id);

        return view('admin.pages.siswa.edit', compact('sekolah', 'siswa'));
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
            'kelamin' => 'required'
        ]);

        $siswa = Siswa::findOrFail($id);

        if ($siswa->update($params)) {
            toast('Data siswa berhasil diubah!', 'success');
            return redirect()->route('siswa.index');
        }
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->delete()) {
            toast('Data siswa berhasil dihapus!', 'success');
        }

        return redirect()->route('siswa.index');
    }
}
