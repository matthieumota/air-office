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
            'offices' => Office::where('user_id', '!=', /*Auth::user()->id*/0)->get(),
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
            'images' => 'array',
            'images.*' => 'required|image|max:2048',
        ]);

        $office = Office::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => $request->user()->id,
        ]);

        foreach ($request->images ?? [] as $image) {
            $office->images()->create([
                'path' => $image->store('offices', 'public'),
            ]);
        }

        return redirect('/bureaux');
    }


    public function edit(Request $request, Office $office)
    {
        abort_if(Auth::user()->id !== (int) $office->user_id, 403);

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

    public function destroy(Office $office)
    {
        abort_if(Auth::user()->id !== (int) $office->user_id, 403);

        $office->delete();

        return redirect('/bureaux');
    }
}
