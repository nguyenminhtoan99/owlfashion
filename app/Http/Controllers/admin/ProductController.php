<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Brand;
use App\models\Category;
use App\models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.pages.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $brands=Brand::get();
        return view('admin.pages.product.create')
        ->with('categories', $categories)
        ->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name'=>'string|required',
        //     'description'=>'string|nullable',
        //     'photo'=>'string|required',
        //     'size'=>'nullable',
        //     'quantity'=>"required|numeric",
        //     'cat_id'=>'required|exists:categories,id',
        //     'brand_id'=>'nullable|exists:brands,id',
        //     'status'=>'required|in:active,inactive',
        //     'condition'=>'required|in:default,new,hot',
        //     'price'=>'required|numeric',
        //     'discount'=>'nullable|numeric'
        // ]);

        $data=$request->all();
        $slug=Str::slug($request->name);
        $data['slug']=$slug;
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            if($image->isValid()){
                $fileName=time() . "_" . rand(0,9999999) . "." .$image->getClientOriginalExtension();
                $image->move(public_path('products'), $fileName);
                $data['photo']=$fileName;
            }
        }
        $status=Product::create($data);
        if($status){
            Toastr::success('Đã thêm thành công sản phẩm', 'Thông báo');
        }
        else{
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('product.index');

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
        $product=Product::findOrFail($id);
        return view('admin.pages.product.edit')->with('product',$product);
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
        $product= Product::findOrFail($id);
        $status = $product->update($request->all());
        if($status){
            Toastr::success('Đã sửa thành công sản phẩm', 'Thông báo');
        }
        else{
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();
        if($status){
            Toastr::success('Đã xoá thành công sản phẩm', 'Thông báo');
        }
        else{
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('product.index');
    }
}
