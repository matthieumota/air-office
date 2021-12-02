<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    public function index()
    {
        return view('offices.index', [
            'offices' => Office::where('user_id', '!=', Auth::user()->id)->get(),
        ]);
    }

    public function show(Office $office)
    {
        return view('offices.show', [
            'office' => $office,
        ]);
    }

    public function create()
    {
        return view('offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric|between:1,500',
        ]);

        Office::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => $request->user()->id,
        ]);

        return redirect('/bureaux');
    }
}
