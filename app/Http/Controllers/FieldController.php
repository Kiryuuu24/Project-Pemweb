<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('admin.fields.index', compact('fields'));
    }

    public function create()
    {
        return view('admin.fields.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name'           => 'required|string|max:255',
        'price_per_hour' => 'required|numeric|min:1000',
        'description'    => 'nullable|string',
        'image'          => 'nullable|image|max:2048',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('fields', 'public');
    }

    Field::create($data);

    return redirect()->route('admin.fields.index')
                     ->with('success', 'Lapangan berhasil ditambahkan!');
}

    public function edit(Field $field)
    {
        return view('admin.fields.edit', compact('field'));
    }

    public function update(Request $request, Field $field)
{
    $request->validate([
        'name'           => 'required|string|max:255',
        'price_per_hour' => 'required|numeric|min:1000',
        'description'    => 'nullable|string',
        'image'          => 'nullable|image|max:2048',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('fields', 'public');
    }

    $field->update($data);

    return redirect()->route('admin.fields.index')
                     ->with('success', 'Lapangan berhasil diupdate!');
}

    public function destroy(Field $field)
    {
        $field->delete();

        return redirect()->route('admin.fields.index')
                         ->with('success', 'Lapangan berhasil dihapus!');
    }
}
