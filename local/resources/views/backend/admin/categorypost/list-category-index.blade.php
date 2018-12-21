@foreach ($categoryItems as $key => $data)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->created_at }}</td>
        <td>{{ $data->updated_at }}</td>
        <td>
            @permission(('page-edit'))
            <a class="btn btn-primary" href="{{ route('categorypost.edit',$data->id) }}">Cập Nhật</a>
            @endpermission
            @permission(('page-delete'))
            {!! Form::open(['method' => 'DELETE','route' => ['categorypost.destroy', $data->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endpermission
        </td>
    </tr>
    @if(!$data->children->isEmpty())
        @include('backend.admin.categorypost.list-category-index', ['categoryItems' => $data->children])
    @endif
@endforeach