<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = Sekolah::OrderBy('name', 'asc')->get();
        return view('admin.pages.sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desa = Desa::OrderBy('name', 'asc')->get();
        return view('admin.pages.sekolah.create', compact('desa'));
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
            'desa_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'npsn' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'status' => 'required',
            'jenjang_pendidikan' => 'required',
            'akreditasi' => 'required',
            'kepala_sekolah' => 'required',
            'tanggal_berdiri' => 'required',
        ]);

        if ($request->foto) {
            $foto = $request->foto;
            $newFoto = date('siHdmY') . "_" . $foto->getClientOriginalName();
            $foto->move('uploads/sekolah/', $newFoto);
            $nameFoto = 'uploads/sekolah/' . $newFoto;
        } else {
            if ($request->status == 'negeri') {
                $nameFoto = 'uploads/sekolah/35251431012020_negeri.jpg';
            } else {
                $nameFoto = 'uploads/sekolah/23171022042020_swasta.jpg';
            }
        }

        $params['foto'] = $nameFoto;

        if (Sekolah::create($params)) {
            toast('Data Sekolah berhasil ditambahkan!', 'success');
            return redirect()->route('sekolah.index');
        }
        return redirect()->route('sekolah.index');
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
        $desa = Desa::OrderBy('name', 'asc')->get();
        $sekolah = Sekolah::findOrFail($id);

        return view('admin.pages.sekolah.edit', compact('desa', 'sekolah'));
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
            'desa_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'npsn' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'status' => 'required',
            'jenjang_pendidikan' => 'required',
            'akreditasi' => 'required',
            'kepala_sekolah' => 'required',
            'tanggal_berdiri' => 'required',
        ]);

        $sekolah = Sekolah::findOrFail($id);
        if ($request->hasFile('foto')) {
            $foto = $request->foto;
            $newFoto = date('siHdmY') . "_" . $foto->getClientOriginalName();
            $foto->move('uploads/sekolah/', $newFoto);
            $nameFoto = 'uploads/sekolah/' . $newFoto;
            $exist_foto = $sekolah['foto'];
            $params['foto'] = $nameFoto;
        } else {
            if ($request->status == 'negeri') {
                $nameFoto = 'uploads/sekolah/35251431012020_negeri.jpg';
            } else {
                $nameFoto = 'uploads/sekolah/23171022042020_swasta.jpg';
            }
        }

        if ($sekolah->update($params)) {
            if (isset($exist_foto) && file_exists($exist_foto)) {
                unlink($exist_foto);
            }
            toast('Data Sekolah berhasil ditambahkan!', 'success');
            return redirect()->route('sekolah.index');
        }
        return redirect()->route('sekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        // unlink($sekolah->foto);

        if ($sekolah->delete()) {
            toast('Data Sekolah berhasil dihapus!', 'success');
        }

        return redirect()->route('sekolah.index');
    }
}
