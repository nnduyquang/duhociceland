<div id="right-bar">
    <div>
        <h6>OUR SERVICES</h6>
        <ul class="services">
            @foreach($listFrontendCommon['homePostOurServicesCategory'] as $key=>$item)
                <li><a href="">{{$item->title}}</a></li>
            @endforeach
        </ul>

        <div class="search-bar d-flex justify-content-between">
            <input type="text" placeholder="Search blog here">
            <button><i class="fas fa-search"></i></button>
        </div>

        <div class="mt-3">
            <div class="sc-nw mb-3 d-flex align-items-center" style="background-color:#0367ae;">
                <i class="fab fa-facebook-f" style="background-color:#0367ae;"></i>
                <a href=""><span>Connect with us On Facebook</span></a>
            </div>
            <div class="sc-nw mb-3 d-flex align-items-center" style="background-color:#0062cc;">
                <i class="fab fa-twitter" style="background-color:#0062cc;"></i>
                <a href=""><span>Twitter us</span></a>
            </div>
            <div class="sc-nw mb-3 d-flex align-items-center" style="background-color:#d81b02;">
                <i class="fab fa-google-plus-g" style="background-color:#d81b02;"></i>
                <a href=""><span>Connect Google+</span></a>
            </div>
        </div>

        <h6>TAGS</h6>

        @for ($i = 0; $i < 8; $i++)
            <div class="tags"><a href="">Tags {{$i}}.</a></div>
        @endfor


    </div>
</div>