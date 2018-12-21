@php
    $arrayCategoryItem=$product->categoryitems(CATEGORY_PRODUCT)->get();
@endphp
@foreach($categoryProduct as $key=>$item)
    <label class="check-container">
        {{$item->name}}
        @if(in_array($item->id,explode(',',$arrayCategoryItem->implode('id',','))))
            {{ Form::checkbox('list_category_id[]', $item->id, true, array('class' => '')) }}
            <span class="check-mark"></span>
        @else
            {{ Form::checkbox('list_category_id[]', $item->id, false, array('class' => '')) }}
            <span class="check-mark"></span>
        @endif
    </label>
    @if(!$item->children->isEmpty())
        @include('backend.admin.product.list-select-option-edit', ['categoryProduct' => $item->children])
    @endif
@endforeach