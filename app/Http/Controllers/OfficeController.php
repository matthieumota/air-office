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

    public function create()
    {
        return view('offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        Office::create([
            'name' => $request->name,
            'user_id' => $request->user()->id,
        ]);

        return redirect('/bureaux');
    }
}
