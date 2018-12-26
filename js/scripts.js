var plugins = {
    menuSideBar: $('.sidebar'),
    slider: $('#slider'),
};

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
document.getElementById("defaultOpen").click();

$(document).ready(function () {

    $('#owl-project').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    var owl = $('#owl-project');
    $('.btn_next').click(function () {
        owl.trigger('next.owl.carousel');
    })
    $('.btn_pre').click(function () {
        owl.trigger('prev.owl.carousel', [300]);
    })

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

    if (plugins.slider.length) {
        runSlider();
    }



});