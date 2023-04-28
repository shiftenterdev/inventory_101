<?php

namespace App\Http\Controllers;


use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

    public function index()
    {
        return view('admin.table.index')->with([
            'tables' => Table::get()
        ]);
    }

    public function create()
    {
        return view('admin.table.create');
    }

    public function store(Request $request)
    {
        Table::create($request->except('_token'));
        return redirect('table');
    }

    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->back();
    }

    public function edit(Table $table)
    {
        return view('admin.table.edit')
            ->with(compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $table->update([
            'to_seat' => $request->to_seat,
            'status' => $request->status,
            'table_no' => $request->table_no
        ]);
        return redirect()->route('table.index')
            ->with([
                'success' => 'Table updated'
            ]);
    }
}
