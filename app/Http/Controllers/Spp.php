<?php

namespace App\Http\Controllers;

use App\Models\SppModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SppExport;

class Spp extends Controller
{
    public function index()
    {
        $pembayaran = SppModel::all();
        $data = [
            'title' => 'SPP | MY APP',
            'active' => 'Spp',
            'pembayaran' => $pembayaran
        ];
        return view('pembayaran.index', $data);
    }

    public function save(Request $request)
    {
        SppModel::create($request->except(['_token', 'simpan']));
        return redirect()->to(url('pembayaran'))->with('dataTambah', 'Data berhasil Di tambah');
    }

    public function delete($id)
    {
        SppModel::destroy($id);
        return redirect()->to(url('pembayaran'))->with('dataDelete', 'Data berhasil Di Hapus');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => SppModel::find($id)
        ];
        return view('pembayaran.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $pembayaran = SppModel::find($id);
        $pembayaran->update($request->except(['_token', '_method        ']));

        return redirect()->to(url('pembayaran'))->with('dataEdit', 'Data berhasil Di Edit');
    }
    public function exportExcel()
    {
        return Excel::download(new SppExport, 'spp-excel.xlsx');
    }
}
