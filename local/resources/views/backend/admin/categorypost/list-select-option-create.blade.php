@foreach($categoryItems as $key=>$item)
    <option value="{{$item->id}}">
        @if(isset($dash))
            @php
                $space='--';
            @endphp
            @for($i=0;$i<=$dash;$i++)
                @php
                    $space=$space.'----';
                @endphp
            @endfor
            @php
                echo $space;
            @endphp
        @endif{{$item->name}}</option>
    @if(!$item->children->isEmpty())
        @php
            $px=($item->level+2);
        @endphp
        @include('backend.admin.categorypost.list-select-option-create', ['data' => $item->children,'dash'=>$px])
    @endif
@endforeach