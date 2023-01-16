<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sekolah;
use App\Models\Alokasi;
use App\Models\Realisasi;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class SekolahController extends Controller
{
    public function Index()
    {
        return view('sekolah.sekolah_login');
    } // end method

    public function Dashboard()
    {
        return view('sekolah.index');
    } // end method

    public function Login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('sekolah')->attempt([
            'email' => $check['email'],
            'password' => $check['password']
        ])) {
            return redirect()->route('sekolah.dashboard')->with('error', 'Sekolah Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    } //end method

    public function SekolahLogout()
    {
        Auth::guard('sekolah')->logout();
        return redirect()->route('login_form')->with('error', 'Sekolah Logout Successfully');
    } //end method

    public function SekolahRegister()
    {
        return view('sekolah.sekolah_register');
    } //end method

    public function SekolahRegisterCreate(Request $request)
    {
        // dd($request->all());
        Sekolah::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('sekolah.login')->with('error', 'Account Register Successfully');
    }

    public function Alokasi(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $sekolah = Alokasi::where('tahun', 'like', "%$katakunci%")
                ->orWhere('tahun', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $sekolah = Alokasi::orderBy('tahun', 'asc')->paginate($jumlahbaris);
        }
        return view('sekolah.alokasi.index')->with('data', $sekolah);
    }

    public function AlokasiCreate()
    {
        // dd($request->all());
        return view('sekolah.alokasi.create');
    }

    // public function AlokasiEdit($i)
    // {
    //     // dd($request->all());
    //     $sekolah = Alokasi::where('nim', $i)->first();
    //     return view('admin.data_sekolah.edit')->with('data', $sekolah);
    // }

    public function AlokasiStore(Request $request)
    {
        Session::flash('kabupaten/kota', $request->kabkota);
        Session::flash('nisn', $request->nisn);
        Session::flash('nama', $request->nama);
        Session::flash('jenjang', $request->jenjang);
        Session::flash('alokasi_murni', $request->alokasi_murni);
        Session::flash('alokasi_tanpaSilpa', $request->alokasi_tanpaSilpa);
        Session::flash('alokasi_silpa', $request->alokasi_silpa);
        $sekolah = [
            'cabdin' => $request->cabdin,
            'kabupaten/kota' => $request->kabkota,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jenjang' => $request->jenjang,
            'alokasi_murni' => $request->alokasi_murni,
            'alokasi_tanpaSilpa' => $request->alokasi_tanpaSilpa,
            'alokasi_silpa' => $request->alokasi_silpa,
        ];
        Alokasi::create($sekolah);
        return redirect()->to('sekolah.alokasi')->with('success', 'Data Alokasi Added Successfully');
    }


    // public function AlokasiUpdate(Request $request, $i)
    // {
    //     $request->validate([
    //         'kabupaten/kota' => 'required',
    //         'nisn' => 'required',
    //         'nama' => 'required',
    //         'jenjang' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ], [
    //         'nama.required' => 'Nama wajib diisi',
    //         'nisn.required' => 'Jurusan wajib diisi',
    //         'nama.required' => 'Nama wajib diisi',
    //         'jenjang.required' => 'Nama wajib diisi',
    //         'email.required' => 'Nama wajib diisi',
    //         'password.required' => 'Nama wajib diisi',
    //     ]);
    //     $sekolah = [
    //         'cabdin' => $request->cabdin,
    //         'kabupaten/kota' => $request->kabkota,
    //         'nisn' => $request->nisn,
    //         'nama' => $request->nama,
    //         'jenjang' => $request->jenjang,
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];
    //     Alokasi::where('nisn', $i)->update($sekolah);
    //     return redirect()->to('admin/data_sekolah')->with('success', 'Berhasil melakukan update data');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $i
     * @return \Illuminate\Http\Response
     */

    public function AlokasiDelete($i)
    {
        // dd($request->all());
        Alokasi::where('nisn', $i)->delete();
        return redirect()->to('sekolah.alokasi')->with('success', 'Berhasil dihapus');
    }

    public function Realisasi(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $sekolah = Realisasi::where('tahun', 'like', "%$katakunci%")
                ->orWhere('tahun', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $sekolah = Realisasi::orderBy('tahun', 'asc')->paginate($jumlahbaris);
        }
        return view('sekolah.realisasi.index')->with('data', $sekolah);
    }

    public function RealisasiCreate()
    {
        // dd($request->all());
        return view('sekolah.realisasi.create');
    }

    // public function AlokasiEdit($i)
    // {
    //     // dd($request->all());
    //     $sekolah = Alokasi::where('nim', $i)->first();
    //     return view('admin.data_sekolah.edit')->with('data', $sekolah);
    // }

    public function RealisasiStore(Request $request)
    {
        Session::flash('nisn', $request->nisn);
        Session::flash('nama', $request->nama);
        Session::flash('tahun', $request->tahun);
        Session::flash('pagu_anggaran', $request->pagu_anggaran);
        Session::flash('rencana_tw1', $request->rencana_tw1);
        Session::flash('realisasi_tw1', $request->realisasi_tw1);
        Session::flash('rencana_tw2', $request->rencana_tw2);
        Session::flash('realisasi_tw2', $request->realisasi_tw2);
        Session::flash('rencana_tw3', $request->rencana_tw3);
        Session::flash('realisasi_tw3', $request->realisasi_tw13);
        Session::flash('rencana_tw4', $request->rencana_tw4);
        Session::flash('realisasi_tw4', $request->realisasi_tw4);
        $sekolah = [
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'pagu_anggaran' => $request->pagu_anggaran,
            'rencana_tw1' => $request->rencana_tw1,
            'realisasi_tw1' => $request->realisasi_tw1,
            'rencana_tw2' => $request->rencana_tw2,
            'realisasi_tw2' => $request->realisasi_tw2,
            'rencana_tw3' => $request->rencana_tw3,
            'realisasi_tw3' => $request->realisasi_tw3,
            'rencana_tw4' => $request->rencana_tw4,
            'realisasi_tw4' => $request->realisasi_tw4
        ];
        Realisasi::create($sekolah);
        return redirect()->to('sekolah.realisasi')->with('success', 'Data Realisasi Added Successfully');
    }
}
