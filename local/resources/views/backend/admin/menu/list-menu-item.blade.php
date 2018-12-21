<ol class="dd-list">
    @foreach($menus as $key=>$item)
        <li class="dd-item" data-id="{{ $item->id }}">
            <div class="float-right item_actions">
                <div class="btn btn-sm btn-danger float-right delete" data-id="{{ $item->id }}">
                    <i class="voyager-trash"></i> Delete
                </div>
                <div class="btn btn-sm btn-primary float-right edit"
                     data-id="{{ $item->id }}"
                     data-title="{{ $item->title }}"
                     data-url="{{ $item->url }}"
                     data-target="{{ $item->target }}"
                     data-icon_class="{{ $item->icon_class }}"
                     data-color="{{ $item->color }}"
                     data-route="{{ $item->route }}"
                     data-parameters="{{ json_encode($item->parameters) }}"
                >
                    <i class="voyager-edit"></i> Edit
                </div>
            </div>
            <div class="dd-handle">
                <span>{{$item->title}}</span> <small class="url">{{ $item->link() }}</small>
            </div>
            @if(!$item->children->isEmpty())
                @include('backend.admin.menu.list-menu-item', ['menus' => $item->children])
            @endif
        </li>
    @endforeach
</ol>