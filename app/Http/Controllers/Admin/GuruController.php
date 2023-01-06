<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::orderBy('name', 'asc')->get();
        return view('admin.pages.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::OrderBy('name', 'asc')->get();
        return view('admin.pages.guru.create', compact('sekolah'));
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
        ]);

        if (Guru::create($params)) {
            toast('Data Guru berhasil ditambahkan!', 'success');
            return redirect()->route('guru.index');
        }
        return redirect()->route('guru.index');
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
        $guru = Guru::findOrFail($id);

        return view('admin.pages.guru.edit', compact('sekolah', 'guru'));
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

        $guru = Guru::findOrFail($id);

        if ($guru->update($params)) {
            toast('Data Guru berhasil diubah!', 'success');
            return redirect()->route('guru.index');
        }
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->delete()) {
            toast('Data Guru berhasil dihapus!', 'success');
        }

        return redirect()->route('guru.index');
    }
}
