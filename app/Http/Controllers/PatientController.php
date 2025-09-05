<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::with('hospital');

        if ($request->filled('hospital_id')) {
            $patients->where('hospital_id', $request->hospital_id);
        }

        $patients = $patients->get();
        $hospitals = Hospital::all();

        if ($request->ajax()) {
            return view('patient.components.list', compact('patients'));
        }

        return view('patient.index', compact('patients', 'hospitals'));
    }

    public function create()
    {
        $hospitals = Hospital::all();
        return view('patient.create', compact('hospitals'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'hospital_id' => 'required|exists:hospitals,id',
        ], [
            'nama.required' => 'Nama pasien wajib diisi!',
            'nama.string' => 'Nama pasien harus berupa teks.',
            'nama.max' => 'Nama pasien maksimal 255 karakter.',

            'alamat.required' => 'Alamat pasien wajib diisi!',
            'alamat.string' => 'Alamat pasien harus berupa teks.',
            'alamat.max' => 'Alamat pasien maksimal 255 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi!',
            'telepon.string' => 'Nomor telepon harus berupa teks/angka.',
            'telepon.max' => 'Nomor telepon maksimal 15 karakter.',

            'hospital_id.required' => 'Rumah sakit wajib dipilih!',
            'hospital_id.exists' => 'Rumah sakit yang dipilih tidak valid.',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Patient::create($validator->validated());

        return redirect()->route('patients.index')->with('success', 'Data Pasien berhasil ditambahkan');
    }

    public function edit(Patient $patient)
    {
        $hospitals = Hospital::all();
        return view('patient.update', compact('patient', 'hospitals'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'hospital_id' => 'required|exists:hospitals,id',
        ], [
            'nama.required' => 'Nama pasien wajib diisi!',
            'nama.string' => 'Nama pasien harus berupa teks.',
            'nama.max' => 'Nama pasien maksimal 255 karakter.',

            'alamat.required' => 'Alamat pasien wajib diisi!',
            'alamat.string' => 'Alamat pasien harus berupa teks.',
            'alamat.max' => 'Alamat pasien maksimal 255 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi!',
            'telepon.string' => 'Nomor telepon harus berupa teks/angka.',
            'telepon.max' => 'Nomor telepon maksimal 15 karakter.',

            'hospital_id.required' => 'Rumah sakit wajib dipilih!',
            'hospital_id.exists' => 'Rumah sakit yang dipilih tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('ok', 'Data Pasien berhasil diubah.');
    }

    public function destroy(Request $request, Patient $patient)
    {
        $patient->delete();

        if ($request->ajax()) {
            return response()->json(['status' => 'ok']);
        }
        return back()->with('ok', 'Data Pasien berhasil dihapus.');
    }

    public function getHospitals()
    {
        return response()->json(Hospital::all());
    }
}
