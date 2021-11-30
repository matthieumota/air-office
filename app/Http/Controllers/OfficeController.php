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
}
