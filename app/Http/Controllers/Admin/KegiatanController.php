<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('created_at', 'asc')->get();
        return view('admin.pages.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kegiatan.create');
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
            'title' => 'required|string|max:50',
            'deskripsi' => 'required',
            'tgl_kegiatan' => 'required',
        ]);

        if ($request->foto) {
            $foto = $request->foto;
            $newFoto = date('siHdmY') . "_" . $foto->getClientOriginalName();
            $foto->move('uploads/kegiatan/', $newFoto);
            $nameFoto = 'uploads/kegiatan/' . $newFoto;
        } else {
            if ($request->status == 'negeri') {
                $nameFoto = 'uploads/kegiatan/35251431012020_negeri.jpg';
            } else {
                $nameFoto = 'uploads/kegiatan/23171022042020_swasta.jpg';
            }
        }

        $params['foto'] = $nameFoto;

        if (Kegiatan::create($params)) {
            toast('Data kegiatan berhasil ditambahkan!', 'success');
            return redirect()->route('kegiatan.index');
        }
        return redirect()->route('kegiatan.index');
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
        $kegiatan = Kegiatan::findOrFail($id);

        return view('admin.pages.kegiatan.edit', compact('kegiatan'));
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
            'title' => 'required|string|max:50',
            'deskripsi' => 'required',
            'tgl_kegiatan' => 'required',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        if ($request->hasFile('foto')) {
            $foto = $request->foto;
            $newFoto = date('siHdmY') . "_" . $foto->getClientOriginalName();
            $foto->move('uploads/kegiatan/', $newFoto);
            $nameFoto = 'uploads/kegiatan/' . $newFoto;
            $exist_foto = $kegiatan['foto'];
            $params['foto'] = $nameFoto;
        } else {
            if ($request->status == 'negeri') {
                $nameFoto = 'uploads/kegiatan/35251431012020_negeri.jpg';
            } else {
                $nameFoto = 'uploads/kegiatan/23171022042020_swasta.jpg';
            }
        }

        if ($kegiatan->update($params)) {
            if (isset($exist_foto) && file_exists($exist_foto)) {
                unlink($exist_foto);
            }
            toast('Data kegiatan berhasil ditambahkan!', 'success');
            return redirect()->route('kegiatan.index');
        }
        return redirect()->route('kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        unlink($kegiatan->foto);

        if ($kegiatan->delete()) {
            toast('Data kegiatan berhasil dihapus!', 'success');
        }

        return redirect()->route('kegiatan.index');
    }
}
