@extends('admin.layouts.master')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">
        <i class="fa fa-indent" aria-hidden="true"></i>Thêm mới sản phẩm
        <small></small>
      </h1>
      <div class="more_info"></div>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-1x"></i> Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="{{route('category.index')}}">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
      </ol>
    </div><!-- /.col -->
  </div>
@endsection

@section('content')
    <div class="card-header">
        <h3 class="card-title">sản phẩm</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Tên sản phẩm<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <input type="text" id="vi__title" name="name" value="" class="form-control vi__title" placeholder="">
                    </div>

                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Mô tả<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                        <textarea id="editor1" name="description"></textarea>
                        @error('sort')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Giá<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                        </div>
                        <input type="number" id="vi__title" name="price" value="" class="form-control vi__title" placeholder="">
                    </div>

                        @error('sort')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Khuyến mãi (%)<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-percent"></i></span>
                        </div>
                        <input type="number" id="vi__title" name="discount" value="" class="form-control vi__title" placeholder="">
                    </div>

                        @error('sort')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Số lượng<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <input type="number" id="vi__title" name="quantity" value="" class="form-control vi__title" placeholder="">
                    </div>

                        @error('sort')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Size<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <select name="size[]" class="form-control selectpicker" multiple data-live-search="true">
                        <option value="">--Chọn size--</option>
                        <option value="S">Small (S)</option>
                        <option value="M">Medium (M)</option>
                        <option value="L">Large (L)</option>
                        <option value="XL">Extra Large (XL)</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="exampleInputFile" class="col-sm-2 col-form-label">Hình ảnh<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="photo" class="form-control-file"
                            id="img_file_upid">
                        </div>
                      </div>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Danh mục<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <select name="cat_id" class="form-control">
                        <option value="">--Chọn danh mục--</option>
                        @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Nhà sản xuất<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <select name="brand_id" class="form-control">
                        <option value="">--Chọn nhà sản xuất--</option>
                        @foreach($brands as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Tình trạng<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <select name="condition" class="form-control">
                        <option value="">--Chọn tình trạng--</option>
                        <option value="default">Default</option>
                        <option value="new">New</option>
                        <option value="hot">Hot</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row  ">
                <label for="vi__title" class="col-sm-2 col-form-label">Trạng thái<span class="seo" title="SEO"></span></label>
                <div class="col-sm-8">
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

    </div>
    <div class="card-footer">
        <button type="reset" class="btn btn-default">Làm lại</button>
        <button type="submit" class="btn btn-info float-right">Thêm mới</button>
    </div>
</form>
@endsection

@section('jsblock')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
