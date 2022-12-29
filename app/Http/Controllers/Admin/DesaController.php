<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::OrderBy('name', 'asc')->get();

        return view('admin.pages.desa.index', compact('desa',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::OrderBy('name', 'asc')->get();
        return view('admin.pages.desa.create', compact('kecamatan'));
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
            'kecamatan_id' => 'required|integer',
            'name' => 'required|string|unique:desa,name',
        ]);

        if (Desa::create($params)) {
            toast('Data Desa berhasil ditambahkan!', 'success');
            return redirect()->route('desa.index');
        }
        return redirect()->route('desa.index');
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
        $kecamatan = Kecamatan::OrderBy('name', 'asc')->get();
        $desa = Desa::findOrFail($id);

        return view('admin.pages.desa.edit', compact('desa', 'kecamatan'));
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
            'kecamatan_id' => 'required|integer',
            'name' => 'required|string|unique:desa,name',
        ]);

        $desa = Desa::findOrFail($id);

        if ($desa->update($params)) {
            toast('Data Desa berhasil diubah!', 'success');
            return redirect()->route('desa.index');
        }
        return redirect()->route('desa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);

        if ($desa->delete()) {
            toast('Data Desa berhasil dihapus!', 'success');
        }

        return redirect()->route('desa.index');
    }
}
