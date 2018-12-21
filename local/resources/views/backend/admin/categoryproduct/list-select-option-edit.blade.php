@foreach($categoryItems as $key=>$item)
    <option {{($categoryItem->parent_id=== $item->id)?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
    @if(!$item->children->isEmpty())
        @include('backend.admin.categoryproduct.list-select-option-edit', ['categoryItems' => $item->children])
    @endif
@endforeach