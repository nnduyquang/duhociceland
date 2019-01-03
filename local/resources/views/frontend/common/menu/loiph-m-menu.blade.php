<div class="container-fluid p-0" id="loiph-m-menu">
    <div  style="width: 100%;background-color:#fff;">

        <ul class="menu-content">
            <div class="search-box">
                <input type="text" placeholder="Enter your search"><button><i class="fas fa-search"></i></button>
            </div>
            @foreach($listMenu as $key=>$item)
                <li><a class="{{ request()->is($item->link()) ? 'active' : '/' }}"
                       href="{{URL::to($item->link())}}">@lang($item->title)</a></li>
            @endforeach

        </ul>
    </div>
</div>
