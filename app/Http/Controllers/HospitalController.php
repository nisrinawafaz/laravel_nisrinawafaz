<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospital.index', compact('hospitals'));
    }

    public function create()
    {
        return view('hospital.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
        ], [
            'nama.required' => 'Nama pasien wajib diisi!',
            'nama.string' => 'Nama pasien harus berupa teks.',
            'nama.max' => 'Nama pasien maksimal 255 karakter.',

            'alamat.required' => 'Alamat pasien wajib diisi!',
            'alamat.string' => 'Alamat pasien harus berupa teks.',
            'alamat.max' => 'Alamat pasien maksimal 255 karakter.',

            'email.required' => 'Email pasien wajib diisi!',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email pasien maksimal 255 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi!',
            'telepon.string' => 'Nomor telepon harus berupa teks/angka.',
            'telepon.max' => 'Nomor telepon maksimal 15 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Hospital::create($validator->validated());

        return redirect()->route('hospitals.index')->with('success', 'Data Rumah Sakit berhasil ditambahkan');
    }

    public function edit(Hospital $hospital)
    {
        return view('hospital.update', compact('hospital'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
        ], [
            'nama.required' => 'Nama pasien wajib diisi!',
            'nama.string' => 'Nama pasien harus berupa teks.',
            'nama.max' => 'Nama pasien maksimal 255 karakter.',

            'alamat.required' => 'Alamat pasien wajib diisi!',
            'alamat.string' => 'Alamat pasien harus berupa teks.',
            'alamat.max' => 'Alamat pasien maksimal 255 karakter.',

            'email.required' => 'Email pasien wajib diisi!',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email pasien maksimal 255 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi!',
            'telepon.string' => 'Nomor telepon harus berupa teks/angka.',
            'telepon.max' => 'Nomor telepon maksimal 15 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $hospital->update($request->all());
        return redirect()->route('hospitals.index')->with('ok', 'Data Rumah Sakit berhasil diubah.');
    }

    public function destroy(Request $request, Hospital $hospital)
    {
        $hospital->delete();

        if ($request->ajax()) {
            return response()->json(['status' => 'ok']);
        }
        return back()->with('ok', 'Data Rumah Sakit berhasil dihapus.');
    }

    public function show(Hospital $hospital)
    {
        return redirect()->route('hospitals.edit', $hospital);
    }
}
