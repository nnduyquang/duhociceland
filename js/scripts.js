var plugins = {
    menuSideBar: $('.sidebar'),
    slider: $('#slider'),
    sendMailHomepage:$('#h_1 #welcome .register button.submit-re'),
    sendMailContact:$('#c_1 button'),
    sendMailPopup:$('.pop-center button.submit-re')
};


$('#m-menu').click(function () {
    var $con = $('.menu-content').css('height');
    if ($con == '0px') {
        $('.menu-content').css({'height': 'auto', 'opacity': '1','top':'100%','display':'block'});
    } else {
        $('.menu-content').css({'height': '0px', 'opacity': '0','top':'-100%','display':'none'});
    }
})


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
// document.getElementById("defaultOpen").click();

$(document).ready(function () {


    function sidebar() {
        var trigger = $('#trigger,#close');
        trigger.on('click', function () {
            $(this).toggleClass('active');
            plugins.menuSideBar.toggleClass('closed');
            $('#blurrMe').toggleClass('blurred')
        })
        $('#wrap-container').on('click', function () {
            if ($('#blurrMe').hasClass('blurred')) {
                $('#blurrMe').toggleClass('blurred')
                plugins.menuSideBar.toggleClass('closed');
            }
        })
    }

    sidebar();

    function runSlider() {
        plugins.slider.nivoSlider({
            effect: 'fade',
            animSpeed: 500,
            pauseTime: 3000,
            pauseOnHover: true,
            controlNav: false,
        });
    }
    function getBaseURL() {
        var url = location.href;  // entire url including querystring - also: window.location.href;
        var baseURL = url.substring(0, url.indexOf('/', 14));
        if (baseURL.indexOf('http://localhost') != -1) {
            // Base Url for localhost
            var url = location.href;  // window.location.href;
            var pathname = location.pathname;  // window.location.pathname;
            var index1 = url.indexOf(pathname);
            var index2 = url.indexOf("/", index1 + 1);
            var baseLocalUrl = url.substr(0, index2);
            return baseLocalUrl + "/";
        }
        else {
            // Root Url for domain name
            return baseURL + "/";
        }
    }

    function runSendMailHomepage(){
        $('#h_1 #welcome .register .button-group button.submit-re .loadingSending').css('display', 'inline-block');
        $('#h_1 #welcome .register .input-group input.input-text').removeClass('is-invalid');
        var data = new FormData($(this).get(0));
        data.append('name', $("#h_1 #welcome .register .input-group input[name='name']").val());
        data.append('phone', $("#h_1 #welcome .register .input-group input[name='phone']").val());
        data.append('email', $("#h_1 #welcome .register .input-group input[name='email']").val());
        data.append('description', $("#h_1 #welcome .register textarea[name='description']").val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: getBaseURL() + "sendmail/sendHomepage",
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                if (data.success) {
                    $('#h_1 #welcome .register .button-group button.submit-re .loadingSending').css('display', 'none');
                    $('#h_1 #welcome .register .button-group button.submit-re .successSending').css('display', 'inline-block');
                    $('#h_1 #welcome .register .button-group button.submit-re .successSending').fadeIn(500);
                    $('#h_1 #welcome .register .button-group span').css('display', 'inline-block');
                    $('#h_1 #welcome .register .button-group span').fadeIn(500);
                    setTimeout("$('#h_1 #welcome .register .button-group button.submit-re .successSending').fadeOut(1500);", 3000);
                    setTimeout("$('#h_1 #welcome .register .button-group span').fadeOut(1500);", 3000);
                    $("#h_1 #welcome .register .input-group input[name='name']").val("");
                    $("#h_1 #welcome .register .input-group input[name='email']").val("");
                    $("#h_1 #welcome .register .input-group input[name='phone']").val("");
                    $("#h_1 #welcome .register textarea[name='description']").val("");
                }
                else {
                    $('#h_1 #welcome .register .button-group button.submit-re .loadingSending').css('display', 'none');
                    var errors = data.validator;
                    if (errors.hasOwnProperty('email')) {
                        $('#h_1 #welcome .register .ip-email .input-text').addClass('is-invalid');
                        $('#h_1 #welcome .register .ip-email .invalid-feedback').html(errors['email']);
                    }
                    if (errors.hasOwnProperty('name')) {
                        $('#h_1 #welcome .register .ip-name .input-text').addClass('is-invalid');
                        $('#h_1 #welcome .register .ip-name .invalid-feedback').html(errors['name']);
                    }
                    if (errors.hasOwnProperty('phone')) {
                        $('#h_1 #welcome .register .ip-phone .input-text').addClass('is-invalid');
                        $('#h_1 #welcome .register .ip-phone .invalid-feedback').html(errors['phone']);
                    }
                }
            }
        });
    }
    function runSendMailContact(){
        $('#c_1 button .loadingSending').css('display', 'inline-block');
        $('#c_1 .input-group input.input-text').removeClass('is-invalid');
        var data = new FormData($(this).get(0));
        data.append('name', $("#c_1 .input-group input[name='name']").val());
        data.append('phone', $("#c_1 .input-group input[name='phone']").val());
        data.append('email', $("#c_1 .input-group input[name='email']").val());
        data.append('title', $("#c_1 input[name='title']").val());
        data.append('description', $("#c_1 textarea[name='description']").val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: getBaseURL() + "sendmail/sendContact",
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                if (data.success) {
                    $('#c_1 button .loadingSending').css('display', 'none');
                    $('#c_1 button .successSending').css('display', 'inline-block');
                    $('#c_1 button .successSending').fadeIn(500);
                    $('#c_1 .button-group span').css('display', 'inline-block');
                    $('#c_1.button-group span').fadeIn(500);
                    setTimeout("$('#c_1 button .successSending').fadeOut(1500);", 3000);
                    setTimeout("$('#c_1 .button-group span').fadeOut(1500);", 3000);
                    $("#c_1 .input-group input[name='name']").val("");
                    $("#c_1 .input-group input[name='email']").val("");
                    $("#c_1 .input-group input[name='phone']").val("");
                    $("#c_1 input[name='title']").val("");
                    $("#c_1 textarea[name='description']").val("");
                }
                else {
                    $('#c_1 button .loadingSending').css('display', 'none');
                    var errors = data.validator;
                    if (errors.hasOwnProperty('email')) {
                        $('#c_1 .ip-email .input-text').addClass('is-invalid');
                        $('#c_1 .ip-email .invalid-feedback').html(errors['email']);
                    }
                    if (errors.hasOwnProperty('name')) {
                        $('#c_1 .ip-name .input-text').addClass('is-invalid');
                        $('#c_1 .ip-name .invalid-feedback').html(errors['name']);
                    }
                    if (errors.hasOwnProperty('phone')) {
                        $('#c_1 .ip-phone .input-text').addClass('is-invalid');
                        $('#c_1 .ip-phone .invalid-feedback').html(errors['phone']);
                    }
                }
            }
        });
    }
    function runSendMailPopup(){
        $('.pop-center button .loadingSending').css('display', 'inline-block');
        $('.pop-center .input-group input.input-text').removeClass('is-invalid');
        var data = new FormData($(this).get(0));
        data.append('name', $(".pop-center .input-group input[name='name']").val());
        data.append('phone', $(".pop-center .input-group input[name='phone']").val());
        data.append('email', $(".pop-center .input-group input[name='email']").val());
        data.append('description', $(".pop-center textarea[name='description']").val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: getBaseURL() + "sendmail/sendHomepage",
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                if (data.success) {
                    $('.pop-center button .loadingSending').css('display', 'none');
                    $('.pop-center button .successSending').css('display', 'inline-block');
                    $('.pop-center button .successSending').fadeIn(500);
                    $('.pop-center .button-group span').css('display', 'inline-block');
                    $('.pop-center.button-group span').fadeIn(500);
                    setTimeout("$('.pop-center button .successSending').fadeOut(1500);", 3000);
                    setTimeout("$('.pop-center .button-group span').fadeOut(1500);", 3000);
                    $(".pop-center .input-group input[name='name']").val("");
                    $(".pop-center .input-group input[name='email']").val("");
                    $(".pop-center .input-group input[name='phone']").val("");
                    $(".pop-center textarea[name='description']").val("");
                }
                else {
                    $('.pop-center button .loadingSending').css('display', 'none');
                    var errors = data.validator;
                    if (errors.hasOwnProperty('email')) {
                        $('.pop-center .ip-email .input-text').addClass('is-invalid');
                        $('.pop-center .ip-email .invalid-feedback').html(errors['email']);
                    }
                    if (errors.hasOwnProperty('name')) {
                        $('.pop-center .ip-name .input-text').addClass('is-invalid');
                        $('.pop-center .ip-name .invalid-feedback').html(errors['name']);
                    }
                    if (errors.hasOwnProperty('phone')) {
                        $('.pop-center .ip-phone .input-text').addClass('is-invalid');
                        $('.pop-center .ip-phone .invalid-feedback').html(errors['phone']);
                    }
                }
            }
        });
    }
    if (plugins.sendMailHomepage.length) {
        plugins.sendMailHomepage.click(function () {
            runSendMailHomepage();
        });
    }
    if (plugins.sendMailPopup.length) {
        plugins.sendMailPopup.click(function () {
            runSendMailPopup();
        });
    }

    if (plugins.sendMailContact.length) {
        plugins.sendMailContact.click(function () {
            runSendMailContact();
        });
    }

    if (plugins.slider.length) {
        runSlider();
    }
    $('.btn-close').click(function () {
        $('#popup-hera').css('display', 'none')
    })





});