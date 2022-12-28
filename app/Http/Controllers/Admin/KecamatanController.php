<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;


use RealRashid\SweetAlert\Facades\Alert as Alert;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::OrderBy('name', 'asc')->get();
        return view('admin.pages.kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kecamatan = $this->validate($request, [
            'name' => 'required|unique:kecamatan',
        ]);

        if (Kecamatan::create($kecamatan)) {
            Alert::success('Success Title', 'Success Message');
            return redirect()->route('kecamatan.index');
        }

        return redirect()->back()->with('warning', 'Data kecamatan tidak berhasil diperbarui!');
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
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.pages.kecamatan.edit', compact('kecamatan'));
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
            'name' => 'required|unique:kecamatan',
        ]);

        $kecamatan = Kecamatan::findOrFail($id);

        if ($kecamatan->update($params)) {
            return redirect()->route('kecamatan.index');
        }
        return redirect()->back()->with('warning', 'Data kecamatan tidak berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        if ($kecamatan->delete()) {
            Session()->flash('success', 'Produk berhasil dihapus.');
        }

        return redirect()->route('kecamatan.index');
    }
}
