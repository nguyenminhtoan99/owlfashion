@extends('admin.layouts.master')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">
        <i class="fa fa-indent" aria-hidden="true"></i> Danh sách danh mục
        <small></small>
      </h1>
      <div class="more_info"></div>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-1x"></i> Trang chủ</a></li>
        <li class="breadcrumb-item active">Danh sách danh mục</li>
      </ol>
    </div><!-- /.col -->
  </div>
@endsection

@section('content')
  <div class="row">
      <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                       @include('admin.layouts.notification')
                    </div>
                </div>
                <div class="card-header with-border">
                    <div class="card-tools">
                        <div class="menu-right">
                            <form action="" id="button_search">
                                <div class="input-group input-group" style="width: 250px;">
                                <input type="text" name="keyword" class="form-control float-right" placeholder="Tìm tên hoặc ID danh mục" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>
                <div class="card-header with-border">
                    <div class="card-tools">
                        <div class="menu-right">
                        <a href="{{route('category.create')}}" class="btn  btn-success  btn-flat" title="Thêm mới" id="button_create_new">
                                <i class="fa fa-plus" title="Thêm mới"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>slug</th>
                                    <th>Trạng thái</th>
                                    <th>Sắp xếp</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>
                                        @if($item->status=='active')
                                            <span class="badge badge-success">{{$item->status}}</span>
                                        @else
                                            <span class="badge badge-warning">{{$item->status}}</span>
                                        @endif
                                    </td>
                                    <td>{{$item->sort}}</td>
                                    <td>
                                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="sửa" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Are you sure to delete this?')" href="{{route('category.destroy',$item->id)}}" class="btn btn-danger btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="xoá" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $categories->links() }} --}}
                    </div>
                </div>
            </div>
      </div>
  </div>
@endsection
