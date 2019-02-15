<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::get();
        return view('Category.index')->with('Category', $Category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $Category               = new Category;
        $Category->name         = $request->name;
        $Category->unit_name    = $request->unit_name;
        $Category->active       = $request->active;
        $Category->description  = $request->description;
        $Category->picture_path = $imageName;
        $Category->save();

        return redirect('admin/category')->with('success', 'Data inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category = Category::find($id);
        return view('Category.update')->with('Category', $Category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Category               = Category::find($id);
        $Category->name         = $request->get('name');
        $Category->unit_name    = $request->get('unit_name');
        $Category->active       = $request->get('active');
        $Category->description  = $request->get('description');
        $Category->picture_path = $request->get('picture_path');
        $Category->save();

        return redirect('/admin/category')->with('success', ' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::find($id);
        $Category->delete();

        return redirect('/admin/role')->with('success', 'Category has been deleted Successfully');
    }
}
