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
                <h2>Quản Lý Ngôn Ngữ</h2>

                @permission(('page-create'))
                <a class="btn btn-success" href="{{ route('locale.create') }}"> Tạo Mới</a>
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
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>TT</th>
                    <th>ID</th>
                    <th>Ngôn Ngữ</th>
                    <th>Icon</th>
                    <th>Viết Tắt</th>
                    <th>Ngày Đăng</th>
                    <th>Ngày Cập Nhật</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($locales as $key => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{Html::image($data->icon,'',array('class'=>'product-img'))}}</td>
                        <td>{{$data->short}}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('locale.edit',$data->id) }}">Cập Nhật</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['locale.destroy', $data->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{--{!! $pages->links() !!}--}}
@stop