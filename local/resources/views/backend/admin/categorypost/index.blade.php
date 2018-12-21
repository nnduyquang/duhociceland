@extends('backend.admin.master')
@section('title-page')
    Quản Lý Chuyên Mục
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                {{--<h2>Quản Lý Chuyên Mục</h2>--}}
            </div>
            <div class="col-md-4 text-right">
                @permission(('page-create'))
                <a class="btn btn-success" href="{{ route('categorypost.create') }}"> Tạo Mới</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="wrap-index">
        <table class="table">
            <tr>
                <th>TT</th>
                <th>ID</th>
                <th>Tên Chuyên Mục</th>
                <th>Ngày Đăng</th>
                <th>Ngày Cập Nhật</th>
                <th width="280px">Action</th>
            </tr>
            @include('backend.admin.categorypost.list-category-index')
        </table>
    </div>
    {{--{!! $pages->links() !!}--}}
@stop