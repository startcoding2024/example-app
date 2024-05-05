<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmer;

class ProgrammerController extends Controller
{
    public function index()
    {
        $programmers = Programmer::all();
        return view('programmers.index', compact('programmers'));
    }
    public function create()
    {
        return view('programmers.create');
    }
    public function store(Request $request)
    {
        Programmer::create($request->all());
        return redirect()->route('programmers.index');
    }
    public function show(Programmer $programmer)
    {
        return view('programmers.show', compact('programmer'));
    }
    public function edit(Programmer $programmer)
    {
        return view('programmers.edit', compact('programmer'));
    }
    public function update(Request $request, Programmer $programmer)
    {
        $programmer->update($request->all());
        return redirect()->route('programmers.index');
    }
    public function destroy(Programmer $programmer)
    {
        // Удалить программиста из базы данных
        $programmer->delete();
        return redirect()->route('programmers.index');
    }

}
