@php
    $arrayCategoryItem=$post->categoryitems(CATEGORY_POST)->get();
@endphp
@foreach($categoryPost as $key=>$item)
    <label class="check-container" @if(isset($style))style="{{$style}}" @endif>
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
        @php
            $px=($item->level+2)*40;
        @endphp
        @include('backend.admin.post.list-select-option-edit', ['categoryPost' => $item->children,'style'=>'padding-left:'.$px.'px'])
    @endif
@endforeach