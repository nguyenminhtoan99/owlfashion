@extends('admin.layouts.master')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">
        <i class="fa fa-indent" aria-hidden="true"></i> Chỉnh sửa danh mục
        <small></small>
      </h1>
      <div class="more_info"></div>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-1x"></i> Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="{{route('category.index')}}">Danh sách danh mục</a></li>
        <li class="breadcrumb-item active">Chỉnh sửa danh mục</li>
      </ol>
    </div><!-- /.col -->
  </div>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">Danh mục</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('category.update',$category->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Tên danh mục<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                    <input type="text" id="vi__title" name="name" value="{{$category->name}}" class="form-control vi__title" placeholder="">
                    </div>

                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Thứ tự xuất hiện<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <input type="text" id="vi__title" name="sort" value="{{$category->sort}}" class="form-control vi__title" placeholder="">
                    </div>

                        @error('sort')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Trạng thái<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <select name="status" class="form-control">
                        <option value="active" {{(($category->status=='active')? 'selected' : '')}} >Active</option>
                        <option value="inactive" {{(($category->status=='inactive')? 'selected' : '')}} >Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

    </div>
    <div class="card-footer">
        <button type="reset" class="btn btn-default">Làm lại</button>
        <button type="submit" class="btn btn-info float-right">Sửa</button>
    </div>
</form>
@endsection
