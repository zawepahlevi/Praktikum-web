<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm(Request $request)
    {
        // Collecting form data
        $data = [
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'provinsi' => $request->input('provinsi'),
            'kota' => $request->input('kota'),
            'nomor_telpon' => $request->input('nomor_telpon'),
        ];

        // Passing the data to the dashboardAdmin view
        return view('dashboardAdmin', compact('data'));
    }

    public function submitForm()
    {
        return view('pesanAdmin');
    }
}
