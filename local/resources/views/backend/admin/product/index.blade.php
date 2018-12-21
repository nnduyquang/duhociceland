@extends('backend.admin.master')
@section('title-page')
    Quản Lý Sản Phẩm
@stop
@section('styles')
@stop
@section('scripts')
@stop
@section('container')
    <div class="col-lg-12 title-header">
        <div class="row">
            <div class="col-md-8">
                <h2>Quản Lý Bất Động Sản</h2>
                @permission(('product-create'))
                <a class="btn btn-success" href="{{ route('product.create') }}"> Tạo Mới </a>
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
            <div class="row">
                <div class="col-md-6">
                    <div id="ulti-bar" class="col-md-12">
                        <div class="row">
                            {{--<div class="col-md-2 v-divider-right">--}}
                            {{--@permission(('product-create'))--}}
                            {{--<a class="btn btn-success" href="{{ route('product.create') }}"> + Sản Phẩm</a>--}}
                            {{--@endpermission--}}
                            {{--</div>--}}
                            <div class="ulti-edit" class="col-md-2">
                                <ul class="ulti-head">
                                    <li><a href="">Chỉnh Sửa</a>
                                        <ul class="ulti-head-dropdown">
                                            <li><a class="ulti-copy" href="#">Sao Chép</a></li>
                                            {!! Form::open(array('route' => 'product.paste','method'=>'POST','id'=>'formPaste')) !!}
                                            {{ Form::hidden('listID') }}
                                            <li><a class="ulti-paste" href="#">Dán</a></li>
                                            {!! Form::close() !!}
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    {!! Form::open(array('route' => 'product.search','method'=>'POST','id'=>'formSearchProduct')) !!}
                    <div class="input-group">
                        {!! Form::text('txtSearch',null, array('class' => 'form-control','id'=>'txtSearch')) !!}
                        <span class="input-group-btn">
                    {!! Form::submit('Tìm Kiếm', ['class' => 'btn btn-info']) !!}
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @if(!empty($keywords))
            <div id="showKeySearch" class="col-md-12">
                <div class="wrap-search">
                    <i class="fa fa-caret-right" aria-hidden="true"></i>{{$keywords}} <a
                            href="{{ route('product.search') }}">X</a>
                </div>
            </div>
            {{ Form::hidden('hdKeyword', $keywords) }}
        @endif


        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>TT</th>
                    <th></th>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>% Giảm Giá</th>
                    <th>% Giá Đã Giảm</th>
                    <th>Còn Hàng?</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Người Đăng</th>
                    <th>Ngày Đăng</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Tình Trạng</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($products as $key => $data)
                    <td>{{ ++$i }}</td>
                    <td>{{Form::checkbox('id[]',$data->id)}}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{Html::image($data->image,'',array('class'=>'product-img'))}}</td>
                    <td>
                        @if(!is_null($data->price)||$data->price!=0)
                            {{$data->price}} VNĐ
                        @else
                            Giá liên hệ
                        @endif
                    </td>
                    <td>
                        @if(!is_null($data->sale)||$data->sale!=0)
                            {{$data->sale}} %
                        @else
                            Không Giảm Giá
                        @endif
                    </td>
                    <td>
                        @if(!is_null($data->final_price)||$data->final_price!=0)
                            {{$data->final_price}} VNĐ
                        @elseif(!is_null($data->sale))
                            {{$data->price}} VNĐ
                        @else
                            Giá liên hệ
                        @endif
                    </td>
                    <td>
                        @if($data->is_in_stock==1)
                            Còn
                        @else
                            Hết Hàng
                        @endif
                    </td>
                    @php
                        $arrayCategoryItem=$data->categoryitems(CATEGORY_PRODUCT)->get();
                    @endphp
                    <td>{{$arrayCategoryItem->implode('name',',')}}</td>
                    <td>{{ $data->users->name }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>{{$data->is_active}}</td>
                    <td>
                        @permission(('product-edit'))
                        <a class="btn btn-primary" href="{{ route('product.edit',$data->id) }}">Cập Nhật</a>
                        @endpermission
                        @permission(('product-delete'))
                        {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $data->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endpermission
                    </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {!! $products->links() !!}
    </div>
@stop