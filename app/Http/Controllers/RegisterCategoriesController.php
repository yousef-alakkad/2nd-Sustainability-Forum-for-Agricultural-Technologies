<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterCategories;
use DataTables;


class RegisterCategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }


    public function getData(Request $request)
    {
            $data = RegisterCategories::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string|max:100',
        ]);

        RegisterCategories::create([
            'name' => $request->name,
            'category' => $request->category,
        ]);

        return response()->json(['success' => 'Category added successfully.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string|max:100',
        ]);

        $category = RegisterCategories::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'category' => $request->category,
        ]);

        return response()->json(['success' => 'Category updated successfully.']);
    }

    public function destroy($id){
        $category = RegisterCategories::findOrFail($id);
        $category->delete();

        return response()->json(['success' => 'Category deleted successfully.']);
    }
    public function printBadge($id)
    {
        $category = RegisterCategories::findOrFail($id);
        return view('categories.badge', compact('category'));
    }




}
