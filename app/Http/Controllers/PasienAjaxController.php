<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienAjaxController extends Controller
{
    public function index()
    {
        return view('pasien.async.index');
    }

    public function data()
    {
        return response()->json(Pasien::all());
    }

    public function store(Request $request)
    {
        $pasien = Pasien::create($request->all());
        return response()->json(['success' => true, 'data' => $pasien]);
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return response()->json($pasien);
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Pasien::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
