<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::paginate(10);
        return view('hospitals.index', compact('hospitals'));
    }

    public function create()
    {
        return view('hospitals.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('hospitals', 'email'),
            ],
            'telepon' => ['required', 'digits_between:8,15'],
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
            'email.unique' => 'Email ini sudah digunakan.',

            'telepon.required' => 'Nomor telepon wajib diisi!',
            'telepon.digits_between' => 'Nomor telepon harus berupa angka, antara 8 sampai 15 digit.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Hospital::create($validator->validated());

        return redirect()->route('hospitals.index')->with('ok', 'Data Rumah Sakit berhasil ditambahkan');
    }

    public function edit(Hospital $hospital)
    {
        return view('hospitals.edit', compact('hospital'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('hospitals', 'email')->ignore($hospital->id),
            ],
            'telepon' => ['required', 'digits_between:8,15'],
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
            'email.unique' => 'Email ini sudah digunakan.',

            'telepon.required' => 'Nomor telepon wajib diisi!',
            'telepon.digits_between' => 'Nomor telepon harus berupa angka, antara 8 sampai 15 digit.',
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
}
