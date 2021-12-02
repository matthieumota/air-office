<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class ModerationController extends Controller
{
    public function index ()
    {
        return view('moderation.index');
    }

    public function offices ()
    {
        return view('moderation.offices', [
            'offices' => Office::where('validated', false)->get()
        ]);
    }

    public function office_view (Office $office)
    {
        return view('moderation.office_view', [
            'office' => Office::findOrFail($office->id)
        ]);
    }

    public function office_delete (Office $office)
    {
        $office->delete();
        return redirect('/moderation/salles');
    }

    public function office_validate (Office $office)
    {
        $office->validated = true;
        $office->save();
        return redirect('/moderation/salles');
    }
}
