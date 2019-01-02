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
                <a class="btn btn-success" href="{{ route('page.create',['locale_id'=>1]) }}"> Tạo Mới Trang</a>
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
                    <th>
                        <div class="wrap-image">
                            {{--@php--}}
                            {{--dd($locales->pluck('id')->toArray());--}}
                            {{--@endphp--}}
                            @foreach($locales as $key=>$item)
                                {{ Html::image($item->icon,'',array('id'=>'','class'=>'image-flag'))}}
                            @endforeach
                        </div>
                    </th>
                    <th>Path</th>
                    <th>Trạng Thái</th>
                    <th>Người Đăng</th>
                    <th>Ngày Đăng</th>
                    <th>Ngày Cập Nhật</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($posts as $key => $data)
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->posts()->first()->title }}</td>
                    <td>
                        <div class="group-locale">
                            @php
                                $localesPost=$data->posts()->get();
                            @endphp
                            @foreach($locales as $key=>$item)
                                @if(in_array($item->id,$localesPost->pluck('locale_id')->toArray()))
                                    @foreach($localesPost as $key2=>$item2)
                                        @if($item2->locale_id==$item->id)
                                            <a href="{{ route('page.edit',['id'=>$item2->id,'locale_id'=>$item2->locale_id]) }}"><i class="far fa-check-square"
                                                                                                                                    style="color: green"></i>

                                                @endif
                                                @endforeach
                                                @else
                                                    <a href="{{ route('page.createLocale',['translation_id'=>$data->posts()->first()->translation_id,'locale_id'=>$item->id]) }}"><i
                                                                class="fas fa-plus"></i></a>
                                        @endif
                                    @endforeach
                        </div>
                    </td>
                    <td>{{ $data->posts()->first()->path }}</td>
                    <td>{{ $data->posts()->first()->is_active }}</td>
                    <td>{{ $data->posts()->first()->users->name }}</td>
                    <td>{{ $data->posts()->first()->created_at }}</td>
                    <td>{{ $data->posts()->first()->updated_at }}</td>
                    <td>
                        @permission(('page-edit'))
                        <a class="btn btn-primary" href="{{ route('page.edit',['id'=>$data->posts()->first()->id,'locale_id'=>$data->posts()->first()->locale_id]) }}">Cập Nhật</a>
                        @endpermission
                        @permission(('page-delete'))
                        {!! Form::open(['method' => 'DELETE','route' => ['page.destroy', $data->posts()->first()->id],'style'=>'display:inline']) !!}
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