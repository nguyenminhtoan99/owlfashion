<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        // return $category;
        return view('admin.pages.category.index')->with('categories',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data= $request->all();
        $slug= Str::slug($request->name);
        $data['slug']=$slug;
        $status=Category::create($data);

        // $status=Category::create([
        //     'name' => $request->name,
        //     'sort' => $request->sort,
        //     'slug'=> Str::slug($request->name),
        // ]);
        if($status){
            Toastr::success('Đã thêm thành công danh mục', 'Thông báo');
            //request()->session()->flash('success','Đã thêm thành công danh mục');
        }
        else{
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
            //request()->session()->flash('error','Xảy ra lỗi, Vui lòng thử lại!');
        }
        return redirect()->route('category.index');
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
        $category=Category::findOrFail($id);
        return view('admin.pages.category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category= Category::findOrFail($id);
        $status = $category->update($request->all());
        if($status){
            Toastr::success('Đã sửa thành công danh mục', 'Thông báo');
        }
        else{
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $status=$category->delete();
        if($status){
            Toastr::success('Đã xoá thành công danh mục', 'Thông báo');
        }
        else{
            Toastr::error('Xảy ra lỗi, Vui lòng thử lại!', 'Thông báo');
        }
        return redirect()->route('category.index');
    }
}
