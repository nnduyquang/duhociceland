<div class="container-fluid" id="h_5">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-4 d-flex justify-content-between">
                <h5>Our Latest Blogs</h5>
                <div>
                    <button class="btn_pre"><i class="fas fa-angle-left"></i></button>
                    <button class="btn_next"><i class="fas fa-angle-right"></i></button>
                </div>
            </div>

            <div class="col-md-12 position-relative">

                <div id="owl-project" class="owl-carousel owl-theme">

                    @for ($i = 0; $i < 8; $i++)
                        <div class="project-items">

                            <div class="img-pro">
                                <a href=""><div class="img"
                                     style="background-image:url({{URL::asset('http://themelamp.com/html/learnedu/images/feature2.jpg')}});">
                                </div>
                                </a>
                            </div>

                            <div class="bottom-project">
                                <h6><a href="">Most Popular Python To Build Apps</a></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste modi neque optio
                                    pariatur placeat qui reprehenderit similique sit tenetur velit.</p>

                                <a href="">Read more <i class="fas fa-long-arrow-alt-right"></i></a>

                            </div>

                        </div>
                    @endfor

                </div>


            </div>

            <div class="col-12 text-center">
                <button class="view-all">View All</button>
            </div>

        </div>
    </div>
</div>