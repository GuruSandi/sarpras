<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function update(Request $request)
    {
        // $user = Auth::user();
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();

        // return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
    public function menudatapengguna()
    {
        $datapengguna = User::where('role', 'admin')->get();

        return view('datapengguna.MenuDataPengguna', compact('datapengguna'));
    }
    public function tambahpengguna()
    {

        return view('datapengguna.tambahpengguna');
    }
    public function posttambahpengguna(Request $request)
    {
        $request->validate([
            'foto' => 'required|file',
            'nama' => 'required',
            'NIP' => 'required|numeric',
            'email' => 'required',
            'password' => 'required',
        ]);
        $fotoPath = $request->foto->store('img/fotopengguna');
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email sudah terdaftar.'])->withInput();
        }
        User::create([
            'nama' => $request->nama,
            'NIP' => $request->NIP,
            'email' => $request->email,
            'status' => 'aktif',
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'foto' => $fotoPath,

        ]);

        return redirect()->route('menudatapengguna')->with('status', 'berhasil menambahkan akun pengguna');
    }
    public function editpengguna(Request $request, User $user)
    {

        return view('pengguna.editpengguna', compact('user'));
    }
    public function posteditpengguna(Request $request, User $user)
    {
        $data = $request->validate([
            'foto' => 'file',
            'nama' => 'required',
            'NIP' => 'required|numeric',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img/fotopengguna');
        } else {
            unset($data['foto']);
        }
        $data['password'] = bcrypt($data['password']);
        $user->update($data);

        return redirect()->route('menudatapengguna')->with('status', 'berhasil mengubah data akun pengguna');
    }
    public function hapuspengguna(User $user)
    {
        $user->delete();

        return redirect()->route('menudatapengguna')->with('status', 'berhasil menghapus akun pengguna');
    }
    public function login()
    {

        return view('auth.login');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('status', 'Berhasil Logout');
    }
    public function postlogin(Request $request)
    {
        $cek = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Mengambil pengguna dengan email yang diberikan
        $user = User::where('email', $cek['email'])->first();

        // Memeriksa apakah pengguna ada dan apakah statusnya aktif
        if ($user && $user->status == 'aktif' && Auth::attempt($cek)) {
            if ($user->role == 'admin') {
                return redirect()->route('menu')->with('status', 'Welcome ' . $user->username);
            } elseif ($user->role == 'guru') {
                return redirect()->route('home')->with('status', 'Welcome ' . $user->username);
            } elseif ($user->role == 'siswa') {
                return redirect()->route('dashboardsiswa')->with('status', 'Welcome ' . $user->username);
            }
        } elseif ($user && $user->status != 'aktif') {
            // Jika pengguna ada tetapi statusnya tidak aktif
            return back()->with('status', 'Akun Anda tidak aktif. Silakan hubungi admin.');
        }

        // Jika autentikasi gagal atau email tidak ditemukan
        return back()->with('status', 'Username atau Password salah');
    }

    public function postlogin1(Request $request)
    {

        $cek = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($cek)) {
            $user = Auth::user();
            if ($user->status == 'aktif') {

                if ($user->role == 'admin') {
                    return redirect()->route('menu')->with('status', 'Welcome ' . $user->username);
                } else {
                    return redirect()->route('home')->with('status', 'Welcome ' . $user->username);
                }
            } else {
                return back()->with('status', 'Akun Anda tidak aktif. Silakan hubungi admin.');
            }
        }

        return back()->with('status', 'Username atau Password salah');
    }
}
