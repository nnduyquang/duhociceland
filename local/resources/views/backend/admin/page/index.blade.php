@extends('backend.admin.master')
@section('title-page')
    Quản Lý Trang
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                {{--<h2>Quản Lý Trang</h2>--}}
            </div>
            <div class="col-md-4 text-right">
                @permission(('page-create'))
                <a class="btn btn-success" href="{{ route('page.create') }}"> Tạo Mới Trang</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {!! Form::open(array('route' => 'page.search','method'=>'POST','id'=>'formSearchPage')) !!}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {!! Form::text('txtSearch',null, array('class' => 'form-control','id'=>'txtSearch')) !!}
            </div>
            <div class="col-md-6">
                {!! Form::button('Tìm Kiếm', array('id' => 'btnSearchPage','class'=>'btn btn-primary')) !!}
            </div>

        </div>
    </div>
    {!! Form::close() !!}
    @if(!empty($keywords))
        <div id="showKeySearch" class="col-md-12">
            <div class="row wrap-search">
                <i class="fa fa-caret-right" aria-hidden="true"></i>{{$keywords}} <a
                        href="{{ route('page.search') }}">X</a>
            </div>
        </div>
        {{ Form::hidden('hdKeyword', $keywords) }}
    @endif
    <div class="wrap-index">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>TT</th>
                    <th>Tên Trang</th>
                    <th>Path</th>
                    <th>Trạng Thái</th>
                    <th>Người Đăng</th>
                    <th>Ngày Đăng</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Tình Trạng</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($posts as $key => $data)
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->path }}</td>
                    <td>{{ $data->is_active }}</td>
                    <td>{{ $data->users->name }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>{{$data->is_active}}</td>
                    <td>
                        @permission(('page-edit'))
                        <a class="btn btn-primary" href="{{ route('page.edit',$data->id) }}">Cập Nhật</a>
                        @endpermission
                        @permission(('page-delete'))
                        {!! Form::open(['method' => 'DELETE','route' => ['page.destroy', $data->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endpermission
                    </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{--{!! $pages->links() !!}--}}
@stop