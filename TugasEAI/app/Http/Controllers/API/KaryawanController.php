<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Exception;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $data = Karyawan::all();
    
            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
            ]);

            $karyawan = karyawan::create([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
            ]);

            $data = Karyawan::where('id', '=', $karyawan->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Karyawan::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
            ]);

            $karyawan = Karyawan::findOrFail($id);

            $karyawan->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
            ]);

            $data = Karyawan::where('id', '=', $karyawan->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
