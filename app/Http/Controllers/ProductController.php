<?php

namespace App\Http\Controllers;

use App\Category;
use App\ItemStatus;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::get();
        return view('Product.index')->with('Product', $Product);
    }

    public function orderby($id = 0)
    {
        $Product = Product::where('asset_category_id', $id)->get();
        return view('Product.index')->with('Product', $Product);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category   = Category::get();
        $ItemStatus = ItemStatus::get();
        return view('Product.create')->with(compact('Category', 'ItemStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Product                       = new Product;
        $Product->asset_category_id    = $request->asset_category_id;
        $Product->barcode              = $request->barcode;
        $Product->asset_item_status_id = $request->asset_item_status_id;
        $Product->cost_center_code     = $request->cost_center_code;
        $Product->paper_description    = $request->paper_description;
        $Product->save();

        return redirect('admin/product')->with('success', 'Data inserted Successfully');
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
        $Product    = Product::find($id);
        $Category   = Category::get();
        $ItemStatus = ItemStatus::get();
        return view('Product.update')->with(compact('Category', 'Product', 'ItemStatus'));
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
        $Product                       = Product::find($id);
        $Product->asset_category_id    = $request->get('asset_category_id');
        $Product->barcode              = $request->get('barcode');
        $Product->asset_item_status_id = $request->get('asset_item_status_id');
        $Product->cost_center_code     = $request->get('cost_center_code');
        $Product->paper_description    = $request->get('paper_description');
        $Product->update();

        return redirect('/admin/product')->with('success', ' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();

        return redirect('/admin/product')->with('success', 'Product has been deleted Successfully');
    }
}
