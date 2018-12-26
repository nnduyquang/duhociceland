<div class="container-fluid p-0" id="footer">
    <div class="top" style="background-image:url({{URL::asset('images/bg/bg-footer.jpg')}});">

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="d-flex align-items-center">
                        <img class="footer-logo" src="{{URL::asset('images/logo/logo.png')}}" alt="">
                        <p>© SEAA by Michael D Allen,</p>
                    </div>
                    <p>
                        Overseas Study Agent.
                        proudly promoting Ireland as a first-class study destination for Vietnamese and Thai
                        students</p>

                    <ul>
                        <li>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt"></i>
                                <p><span class="text-primary">Address:</span> 6 Barry's Place.
                                    Cathedral Road, Cork City, Ireland</p>
                            </div>
                        <li>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-globe-americas"></i>
                                <p><span class="text-primary">Email:</span> mickalleny2k@gmail.com</p>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone-square"></i>
                                <p><span class="text-primary">Tel:</span> +84 - 1256- 465607</p>
                            </div>
                        </li>
                        <li>
                            <div class="sc-nw">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 mb-3">
                    <h4>USEFUL LINK</h4>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">F.A.Q</a></li>
                        <li><a href="">Gallery</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 mb-3 blog">
                    <h4>SERVICES</h4>
                    <ul>
                        @for ($i = 0; $i < 3; $i++)

                            <li>
                                <div class="d-flex pb-2">
                                    <div class="img-ser"
                                         style="background-image:url({{URL::asset('http://demo9.cmsmart.net/edusite_1/wp-content/uploads/2016/11/edusite-class-101x70.jpg')}});">

                                    </div>
                                    <a href="">Services Demo 1</a>
                                </div>
                            </li>

                        @endfor

                    </ul>

                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <h4>GALLERY</h4>
                    <div class="row p-2 mt-3">
                        @for ($i = 0; $i < 9; $i++)

                            <div class="col-4 p-1">
                                <a href="">
                                    <div class="img-gallery"
                                         style="background-image:url({{URL::asset('http://demo9.cmsmart.net/edusite_1/wp-content/uploads/2016/11/edue-short-online-150x150.jpg')}}});">

                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="container">
            <p>Copyright © 2018 smartlinks.vn . All Rights Reserved</p>
        </div>
    </div>
</div>
