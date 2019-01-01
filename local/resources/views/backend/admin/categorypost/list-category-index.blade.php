@foreach ($categoryItems as $key => $data)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{Form::checkbox('id[]',$data->categoryitems()->first()->id)}}</td>
        <td>{{ $data->categoryitems()->first()->id }}</td>
        <td @if(isset($style))style="{{$style}}" @endif>{{ $data->categoryitems()->first()->name }}</td>
        <td>
            <div class="group-locale">
                @php
                    $localesPost=$data->categoryitems()->get();
                @endphp
                @foreach($locales as $key=>$item)
                    @if(in_array($item->id,$localesPost->pluck('locale_id')->toArray()))
                        @foreach($localesPost as $key2=>$item2)
                            @if($item2->locale_id==$item->id)
                                <a href="{{ route('categorypost.edit',$item2->id) }}"><i class="far fa-check-square"
                                                                                            style="color: green"></i>

                                    @endif
                                    @endforeach
                                    @else
                                        <a href="{{ route('categorypost.createLocale',['translation_id'=>$data->categoryitems()->first()->translation_id,'locale_id'=>$item->id]) }}"><i
                                                    class="fas fa-plus"></i></a>
                            @endif
                        @endforeach
            </div>
        </td>
        <td>{{ $data->categoryitems()->first()->created_at }}</td>
        <td>{{ $data->categoryitems()->first()->updated_at }}</td>
        <td>
            @permission(('page-edit'))
            <a class="btn btn-primary" href="{{ route('categorypost.edit',$data->categoryitems()->first()->id) }}">Cập Nhật</a>
            @endpermission
            @permission(('page-delete'))
            {!! Form::open(['method' => 'DELETE','route' => ['categorypost.destroy', $data->categoryitems()->first()->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endpermission
        </td>
    </tr>

@endforeach