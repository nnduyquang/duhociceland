@extends('backend.admin.master')
@section('title-page')
    Quản Lý Bài Viết
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                <h2>Quản Lý Bài Viết</h2>
                @permission(('post-create'))
                <a class="btn btn-success" href="{{ route('post.create',['locale_id'=>1]) }}"> Tạo Mới Bài Viết</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {!! Form::open(array('route' => 'post.search','method'=>'POST','id'=>'formSearchPost')) !!}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {!! Form::text('txtSearch',null, array('class' => 'form-control','id'=>'txtSearch')) !!}
            </div>
            <div class="col-md-6">
                {!! Form::button('Tìm Kiếm', array('id' => 'btnSearchPost','class'=>'btn btn-primary')) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    @if(!empty($keywords))
        <div id="showKeySearch" class="col-md-12">
            <div class="row wrap-search">
                <i class="fa fa-caret-right" aria-hidden="true"></i>{{$keywords}} <a
                        href="{{ route('post.search') }}">X</a>
            </div>
        </div>
        {{ Form::hidden('hdKeyword', $keywords) }}
    @endif
    <div class="wrap-index">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>TT</th>
                    <th>Tên Bài Viết</th>
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
                    <th>Người Đăng</th>
                    <th>Ngày Đăng</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Chuyên Mục</th>
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
                                            <a href="{{ route('post.edit',['id'=>$item2->id,'locale_id'=>$item2->locale_id]) }}"><i class="far fa-check-square"
                                                                                             style="color: green"></i>

                                                @endif
                                                @endforeach
                                                @else
                                                    <a href="{{ route('post.createLocale',['translation_id'=>$data->posts()->first()->translation_id,'locale_id'=>$item->id]) }}"><i
                                                                class="fas fa-plus"></i></a>
                                        @endif
                                    @endforeach
                        </div>
                    </td>
                    <td>{{ $data->posts()->first()->users->name }}</td>
                    <td>{{ $data->posts()->first()->created_at }}</td>
                    <td>{{ $data->posts()->first()->updated_at }}</td>
                    @php
                        $arrayCategoryItem=$data->posts()->first()->categoryitems(CATEGORY_POST)->get();
                    @endphp
                    <td>{{$arrayCategoryItem->implode('name',',')}}</td>
                    <td>
                        @permission(('post-edit'))
                        <a class="btn btn-primary" href="{{ route('post.edit',['id'=>$data->posts()->first()->id,'locale_id'=>$data->posts()->first()->locale_id]) }}">Cập
                            Nhật</a>
                        @endpermission
                        @permission(('post-delete'))
                        {!! Form::open(['method' => 'DELETE','route' => ['post.destroy', $data->posts()->first()->id],'style'=>'display:inline']) !!}
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