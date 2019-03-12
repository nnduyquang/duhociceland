<style>

</style>

<div class="animated fadeIn" id="popup-hera">

    <div class="popup-content animated bounceIn delay-1s">
        <div class="pop-center" style="background-image:url({{URL::to('images/common/a1-2-600x395.jpg')}});">
            <div class="row">
                <div class="col-md-6">
                    <div class="one-item">
                        <h4>Thank you for visiting our website</h4>
                        <p>How May I Help You?</p>
                        {{--<a href="{{URL::to('services/studying-abroad-in-ireland')}}">Get Started with Studying Abroad In Ireland</a>--}}
                        {{--<a href="{{URL::to('contact.html')}}">I have a few questions first!</a>--}}
                        <div class="register">
                            <div class="content">
                                <h4>@lang('content.home_contact_title')</h4>
                                <div class="ip-name input-group" style="display: block">
                                    <input name="name" type="text" placeholder="@lang('content.home_contact_name')"
                                           class="form-control input-text"
                                           style="display: inline-block;border-radius: unset">
                                    <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                        Please choose a username.
                                    </div>
                                </div>
                                <div class="ip-phone input-group" style="display: block">
                                    <input name="phone" type="text" placeholder="@lang('content.home_contact_phone')"
                                           class="form-control input-text"
                                           style="display: inline-block;border-radius: unset">
                                    <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                        Please choose a username.
                                    </div>
                                </div>
                                <div class="ip-email input-group" style="display: block">
                                    <input name="email" type="text" placeholder="@lang('content.home_contact_email')"
                                           class="form-control input-text"
                                           style="display: inline-block;border-radius: unset">
                                    <div class="invalid-feedback" style="font-size: 15px;font-weight:  bold;">
                                        Please choose a username.
                                    </div>
                                </div>
                                <textarea name="description" rows="4" cols="50"
                                          placeholder="@lang('content.home_contact_message')"></textarea>
                                <div class="btn-submit">
                                    {{--<a href="#">đăng ký</a>--}}
                                    <div class="button-group">
                                        <button type="button"
                                                class="btn btn-contact submit-re">@lang('content.home_contact_button')<i
                                                    class="fa fa-spinner fa-spin fa-3x fa-fw loadingSending" style="
    font-size: 15px;display: none"></i><i
                                                    class="fa fa-check-circle successSending" aria-hidden="true"
                                                    style="display: none"></i></button>
                                        <span style="display: none;color:  green;font-weight:  bold;margin-top:  5px;">Chúng tôi đã nhận được mail và sẽ phản hồi quý khách trong 24h. Xin cảm ơn.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <button class="btn-close animated fadeInDown delay-1s text-center"><i class="fas fa-times"></i></button>
        </div>
    </div>

</div>

