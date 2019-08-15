<div class="container-fluid" id="c_1">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3 text-center mb-lg-0 mb-2">
                <div class="info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>{{loai_bo_html_tag($listFrontendCommon['contact'])}}</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-lg-0 mb-2">
                <div class="info">
                    <i class="fas fa-headphones-alt"></i>
                    <p>{{$listFrontendCommon['config-phone-1']}}</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-lg-0 mb-2">
                <div class="info">
                    <i class="far fa-envelope"></i>
                    <p>{{$listFrontendCommon['email']}}</p>
                    <p>michael@irelandos.com</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-lg-0 mb-2">
                <div class="info">
                    <div>
                        <a target="_blank" href="http://www.facebook.com/irelandos"><i class="fab fa-facebook-f"></i></a>
                        {{--<a href=""><i class="fab fa-twitter"></i></a>--}}
                        {{--<a href=""><i class="fab fa-google-plus-g"></i></a>--}}
                    </div>
                    <p>Social Network</p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mb-lg-0 mb-2">
                <h3>@lang('content.contact_quickcontact')</h3>
                <p>@lang('content.contact_content')</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="ip-name input-group">
                            <input class="form-control input-text" name="name" type="text"
                                   placeholder="@lang('content.contact_form_name')">
                            <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ip-email input-group">
                            <input class="form-control input-text" name="email" type="text"
                                   placeholder="@lang('content.contact_form_email')">
                            <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ip-phone input-group">
                            <input class="form-control input-text" type="text" name="phone"
                                   placeholder="@lang('content.contact_form_phone')">
                            <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="title" placeholder="@lang('content.contact_form_title')">
                    </div>
                    <div class="col-md-12">
                        <textarea name="description" id="" cols="30" rows="10"
                                  placeholder="@lang('content.contact_form_message')"></textarea>
                    </div>
                    <div class="col-md-12 text-left btn-submit">
                        <div class="button-group">
                            <button type="button" class="btn btn-contact submit-re">@lang('content.contact_form_send')<i
                                        class="fab fa-telegram-plane pl-1"></i><i
                                        class="fa fa-spinner fa-spin fa-3x fa-fw loadingSending" style="
    font-size: 15px;display: none"></i><i
                                        class="fa fa-check-circle successSending" aria-hidden="true"
                                        style="display: none"></i></button>
                            <span style="display: none;color:  green;font-weight:  bold;margin-top:  5px;">Chúng tôi đã nhận được mail và sẽ phản hồi quý khách trong 24h. Xin cảm ơn.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-lg-0 mb-2">
                <h3>Map</h3>
                <div class="mt-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.108945568562!2d106.66122695066046!3d10.80296726161878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175293abb8f578f%3A0xbae110f45f601d3c!2zMzkgVHLGsOG7nW5nIFPGoW4sIFBoxrDhu51uZyA0LCBUw6JuIELDrG5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1547453305918"
                            width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <p>@lang('content.contact_address') : {{loai_bo_html_tag($listFrontendCommon['contact'])}}</p>
                </div>
            </div>
        </div>
    </div>
</div>