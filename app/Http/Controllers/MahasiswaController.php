<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = mahasiswa::get();
        return view('index', ['data' => $data]);
    }

    public function create()
    {
        return view('create');
    }

    public function post(Request $request)
    {
        // role validate field
        $role = [
            'npm' => 'required|max:8',
            'username' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'born' => 'required',
            'phone' => 'required|max:12',
            'address' => 'required',
        ];
        // message validate field
        $message = [
            'npm.required' => "Npm tidak boleh kosong!",
            'npm.max' => "Npm tidak boleh lebih dari 8 karakter!",
            'username.required' => "Username tidak boleh kosong!",
            'fakultas.required' => "Fakultas tidak boleh kosong!",
            'jurusan.required' => "Jurusan tidak boleh kosong!",
            'born.required' => "Born tidak boleh kosong!",
            'phone.required' => "Phone tidak boleh kosong!",
            'address.required' => "Address tidak boleh kosong!",
        ];
        // validate request
        $request->validate($role, $message);

        // check validate npm unique
        $checknpm = mahasiswa::where('npm', $request->npm)->get();
        if (count($checknpm) == 0) {

            try {
                //code...
                $data = new mahasiswa();
                $data->npm = $request->npm;
                $data->username = $request->username;
                $data->fakultas = $request->fakultas;
                $data->jurusan = $request->jurusan;
                $data->born = $request->born;
                $data->phone = $request->phone;
                $data->address = $request->address;
                $data->save();
                return redirect()->back()->with('success', 'Data berhasil disimpan!');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->back()->with('error', $th);
            }
        } else {
            return redirect()->back()->with('error', 'NPM sudah digunakan!');
        }
    }

    public function view($id)
    {

        $data = mahasiswa::find($id);
        return view('show', ['data' => $data]);
    }

    public function edit($id)
    {

        $data = mahasiswa::find($id);
        return view('edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        // role validate field
        $role = [
            'username' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'born' => 'required',
            'phone' => 'required|max:12',
            'address' => 'required',
        ];
        // message validate field
        $message = [
            'username.required' => "Username tidak boleh kosong!",
            'fakultas.required' => "Fakultas tidak boleh kosong!",
            'jurusan.required' => "Jurusan tidak boleh kosong!",
            'born.required' => "Born tidak boleh kosong!",
            'phone.required' => "Phone tidak boleh kosong!",
            'address.required' => "Address tidak boleh kosong!",
        ];
        // validate request
        $request->validate($role, $message);

        try {
            //code...
            $data = mahasiswa::find($id);
            $data->username = $request->username;
            $data->fakultas = $request->fakultas;
            $data->jurusan = $request->jurusan;
            $data->born = $request->born;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
            return redirect()->back()->with('success', 'Data berhasil di update');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th);
        }
    }


    public function delete($id)
    {
        $data = mahasiswa::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data telah dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus!');
        }
    }
}
