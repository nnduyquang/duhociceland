@foreach($categoryPost as $key=>$item)
    <label class="check-container" @if(isset($style))style="{{$style}}" @endif>
        {{$item->name}}
        {{ Form::checkbox('list_category_id[]', $item->id, false, array('class' => '')) }}
        <span class="check-mark"></span>
    </label>
    @if(!$item->children->isEmpty())
        @php
            $px=($item->level+2)*40;
        @endphp
        @include('backend.admin.post.list-select-option-create', ['categoryPost' => $item->children,'style'=>'padding-left:'.$px.'px'])
    @endif
@endforeach