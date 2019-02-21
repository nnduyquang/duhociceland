<style>
    #popup-hera {
        width: 100%;
        height: 100%;
        background-color: rgba(00, 00, 00, 0.8);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        overflow: hidden;
        text-align: center;
    }

    #popup-hera .popup-content {
        width: 100%;
        height: 100%;
        /*background-color: #fff;*/
        position: relative;
    }

    #popup-hera .popup-content .pop-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60%;
        background-color: white;
        padding: 25px;
        background-repeat: no-repeat;
        background-position: right;
        background-attachment: scroll;
        background-size: cover;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;

    }
    #popup-hera .popup-content .pop-center .one-item{
        background-color: rgba(255,255,255,0.73);
        padding: 25px;
    }

    #popup-hera .popup-content .pop-center .one-item h4 {
        color: #004085;
        font-weight: bold;
        font-size: 25px;
        text-align: left;
    }

    #popup-hera .popup-content .pop-center .one-item p {
        padding: 20px 0;
        font-size: 20px;
        text-align: left;
        color: rgb(102, 104, 120);
    }

    #popup-hera .popup-content .pop-center .one-item a {
        font-size: 18px;
        font-weight: 600;
        padding: 20px 12px;
        background-color: green;
        color: white;
        display: block;
        margin-bottom: 20px;
        border: 1px solid #d8d7d7;
        border-radius: 8px;
    }

    #popup-hera .popup-content .pop-center .one-item a + a {
        background-color: inherit;
        color: #666878;
    }

    .btn-close {
        position: absolute;
        border: none;
        top: -14px;
        right: -22px;
        cursor: pointer;
        font-weight: bold;
        font-size: 15px;
        transition: .3s;
        text-align: center;
        background-color: transparent;
    }

    .btn-close i {
        transition: .3s;
        /*line-height: 28px;*/
        text-align: center;
        margin-right: 3px;
        width: 100%;
        height: 28px !important;
        width: 28px !important;
        border-radius: 50%;
        background-color: #fff;
        line-height: 27px;
    }

    .btn-close:hover i {
        transform: rotate(360deg);
    }

    @media only screen and (max-width: 800px) {
        #popup-hera .popup-content .pop-center {
            width: 90%;
            background-position: inherit;
        }
        #popup-hera .popup-content .pop-center .one-item h4 {
            text-align: center;
        }

        #popup-hera .popup-content .pop-center .one-item p{
            text-align: center;
        }
    }


</style>

<div class="animated fadeIn" id="popup-hera">

    <div class="popup-content animated bounceIn delay-1s">
        <div class="pop-center" style="background-image:url({{URL::to('images/common/study-in-Ireland.jpg')}});">
            <div class="row">
                <div class="col-md-6">
                    <div class="one-item">
                    <h4>Thank you for visiting our website</h4>
                    <p>How May I Help You?</p>
                    <a href="{{URL::to('services/studying-abroad-in-ireland')}}">Get Started with Studying Abroad In Ireland</a>
                    <a href="{{URL::to('contact.html')}}">I have a few question first!</a>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <button class="btn-close animated fadeInDown delay-1s text-center"><i class="fas fa-times"></i></button>
        </div>
    </div>

</div>

