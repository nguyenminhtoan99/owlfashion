<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\models\Brand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.pages.brand.index')->with('brands', $brand);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $data = $request->all();
        $slug = Str::slug($request->name);
        $data['slug'] = $slug;
        $status = Brand::create($data);

        if ($status) {
            Toastr::success('Đã thêm thành công nha san xuat', 'Thông báo');
        } else {
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.pages.brand.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $status = $brand->update($request->all());
        if ($status) {
            Toastr::success('Đã sửa thành công nha san xuat', 'Thông báo');
        } else {
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $status = $brand->delete();
        if ($status) {
            Toastr::success('Đã xoá thành công nha san xuat', 'Thông báo');
        } else {
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('brand.index');
    }
}
