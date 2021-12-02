<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\User;
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


    public function edit(Request $request, Office $office, User $user)
    {

        abort_if(Auth::user()->id !== $office->user_id, 403);

        if ($request->isMethod('post')) {

            $office->update([
                'name' => $request->name
            ]);
            return redirect('/bureaux');
        }

        return view('offices.edit', [
            'office' => $office
        ]);
    }
}
