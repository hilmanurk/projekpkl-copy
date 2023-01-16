<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\BOPSekolah;
use App\Models\BOPSekolahSMA;
use App\Models\DataSekolah;
use App\Models\KodeRekening;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    } // end method

    public function Dashboard(){
        return view('admin.index');
        
    } // end method

    public function Login(Request $request){
        // dd($request->all());
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 
        'password'=>$check['password']])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }
        else{
            return back()->with('error', 'Invalid Email or Password');
        }
    } //end method

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logout Successfully');
    } //end method

    public function AdminRegister(){
        return view('admin.admin_register');
    } //end method

    public function AdminRegisterCreate(Request $request){
        // dd($request->all());
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.data_sekolah')->with('error','Data Sekolah Added Successfully');
    } 

    public function BOPSekolahSMA(Request $request){
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $bop = BOPSekolahSMA::where('nama', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('nisn', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $bop =  BOPSekolahSMA::orderBy('nama', 'asc')->paginate($jumlahbaris);
        }
        return view('admin.bop.bop_sma.index')->with('data', $bop);
    }

    public function DataSekolah(Request $request){
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $sekolah = DataSekolah::where('nama', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('nisn', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $sekolah = DataSekolah::orderBy('nama', 'asc')->paginate($jumlahbaris);
        }
        return view('admin.data_sekolah.index')->with('data', $sekolah);
    }

    public function DataSekolahCreate(){
        // dd($request->all());
        return view('admin.data_sekolah.create');
    } 

    public function DataSekolahEdit($i){
        // dd($request->all());
        $sekolah = DataSekolah::where('nim', $i)->first();
        return view('admin.data_sekolah.edit')->with('data',$sekolah);
    } 

    public function DataSekolahStore(Request $request){
        Session::flash('kabupaten/kota',$request->kabkota);
        Session::flash('nisn',$request->nisn);
        Session::flash('nama',$request->nama);
        Session::flash('jenjang',$request->jenjang);
        Session::flash('email',$request->email);
        Session::flash('password',$request->password);

        $sekolah = [
            'cabdin'=>$request->cabdin,
            'kabupaten/kota'=>$request->kabkota,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'jenjang'=>$request->jenjang,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        DataSekolah::create($sekolah);
        return redirect()->to('admin.data_sekolah')->with('success','Data Sekolah Added Successfully');
    }  
     

    public function DataSekolahUpdate(Request $request, $i)
    {
        $request->validate([
            'kabupaten/kota' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'jenjang' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nisn.required' => 'Jurusan wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'jenjang.required' => 'Nama wajib diisi',
            'email.required' => 'Nama wajib diisi',
            'password.required' => 'Nama wajib diisi',
        ]);
        $sekolah = [
            'cabdin'=>$request->cabdin,
            'kabupaten/kota'=>$request->kabkota,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'jenjang'=>$request->jenjang,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        DataSekolah::where('nisn', $i)->update($sekolah);
        return redirect()->to('admin/data_sekolah')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $i
     * @return \Illuminate\Http\Response
     */

    public function DataSekolahDelete($i){
        // dd($request->all());
        DataSekolah::where('nisn', $i)->delete();
        return redirect()->to('admin.data_sekolah')->with('success','Berhasil dihapus');
    } 

    public function KodeRekening(Request $request){
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $rekening = KodeRekening::where('kode_rekening', 'like', "%$katakunci%")
                ->orWhere('keterangan', 'like', "%$katakunci%")
                ->orWhere('kode_rekening', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $rekening = KodeRekening::orderBy('kode_rekening', 'asc')->paginate($jumlahbaris);
        }
        return view('admin.kode_rekening.index')->with('rekening', $rekening);
    }

    public function KodeRekeningCreate(){
        // dd($request->all());
        return view('admin.kode_rekening.create');
    } 

    public function KodeRekeningStore(Request $request){
        Session::flash('kabupaten/kota',$request->kabkota);
        Session::flash('nisn',$request->nisn);
        Session::flash('nama',$request->nama);
        Session::flash('jenjang',$request->jenjang);
        Session::flash('kode_rekening',$request->kode_rekening);
        Session::flash('keterangan',$request->keterangan);

        $rekening = [
            'kabupaten/kota'=>$request->kabkota,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'jenjang'=>$request->jenjang,
            'kode_rekening'=>$request->kode_rekening,
            'keterangan'=>$request->keterangan
        ];
        KodeRekening::create($rekening);
        return redirect()->to('admin.kode_rekening')->with('success','Data Sekolah Added Successfully');
    }  

    public function KodeRekeningDelete($i){
        // dd($request->all());
        KodeRekening::where('kode_rekening', $i)->delete();
        return redirect()->to('admin.kode_rekening')->with('success','Berhasil dihapus');
    } 
}
