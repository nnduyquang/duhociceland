integratedCKEDITOR('description-page', height = 200);
integratedCKEDITOR('description-page-introduce',height=200);
if ($('#btnBrowseImage').length) {
    var button1 = document.getElementById('btnBrowseImage');
    button1.onclick = function () {
        selectFileWithKCFinder('pathImage', 'showHinh');
    }
}

$('.ulti-copy').click(function () {
    var selected = [];
    $('input[type=checkbox][name=id\\[\\]]').each(function () {
        if ($(this).is(":checked")) {
            selected.push($(this).val());
        }
    });
    if (selected.length != 0) {
        $('input[name=listID]').val(selected);
        alert('Đã lưu sản phẩm');
    }
    else {
        alert('Mời bạn chọn sản phẩm');
    }
    console.log(selected);
    // alert(id[0]);
});
$('.ulti-paste').click(function () {
    if (!$('input[name=listID]').val()) {
        alert('Bạn chưa Sao Chép Hoặc Chưa chọn sản phẩm');
    }
    else {
        $('#formPaste').submit();
    }
});
// SEO
$("input[name='seo_keywords']").keyup(function () {
    var getidTitle = $("#seo-part .content .show-pattern .title");
    var getidDescription = $("#seo-part .content .show-pattern .description");
    var strKeyword = $(this).val();
    strKeyword = replace_special_character_by_comma(strKeyword);
    if (strKeyword.length > 3) {
        if (strKeyword.substr(strKeyword.length - 1)===strKeyword.substr(strKeyword.length - 2,1)) {
            strKeyword=strKeyword.substr(0,strKeyword.length - 1);
        }
    }
    $(this).val(strKeyword);
    showErrorSEO(strKeyword.toLowerCase(), getidTitle, getidDescription);
})
$("input[name='seo_title']").keyup(function () {
    var getidTitle = $("#seo-part .content .show-pattern .title");
    var getidDescription = $("#seo-part .content .show-pattern .description");
    var strKeyword = $("input[name='seo_keywords']").val();
    showErrorSEO(strKeyword.toLowerCase(), getidTitle, getidDescription);
    var getid = $("#seo-part .content .show-pattern .title");
    getid.html($(this).val());
    var titleWidth = getid.width();
    if (titleWidth > 600) {
        cutString(getid);
        var temp = getid.html().lastIndexOf(' ');
        getid.html(getid.html().substring(0, temp + 1) + '...');
    }
    resetSentence();
});


$("input[name='seo_title']").bind("paste", function (e) {
    var getid = $("#seo-part .content .show-pattern .title");
    var pasteText = e.originalEvent.clipboardData.getData('text');
    getid.html(pasteText);
    var titleWidth = getid.width();
    if (titleWidth > 600) {
        cutStringTitle(getid);
        var temp = getid.html().lastIndexOf(' ');
        getid.html(getid.html().substring(0, temp + 1) + '...');
    }
});

$("textarea[name='seo_description']").keyup(function () {
    var getid = $("#seo-part .content .show-pattern .description");
    var getidTitle = $("#seo-part .content .show-pattern .title");
    var getidDescription = $("#seo-part .content .show-pattern .description");
    var strKeyword = $("input[name='seo_keywords']").val();
    showErrorSEO(strKeyword.toLowerCase(), getidTitle, getidDescription);
    getid.html($(this).val());
    var descriptionLength = getid.html().length;
    if (descriptionLength > 150) {
        cutStringDescription(getid);
        var temp = getid.html().lastIndexOf(' ');
        getid.html(getid.html().substring(0, temp + 1) + '...');
    }
    resetSentence();
});

$("input[name='title']").keyup(function () {
    var link = change_alias($(this).val());
    link = link.replace(/\s/g, "-");
    $("span.link").html(getBaseURL() + link);
    resetSentence();
});

$('#btnBrowseMore').click(function () {
    window.KCFinder = {
        callBackMultiple: function (files) {
            window.KCFinder = null;
            var listImage = "";
            // textarea.value = "";
            for (var i = 0; i < files.length; i++)
                listImage += "<div class='col-md-3 text-center one-image'>" +
                    "<img src='" + files[i] + "' id='showHinh' class='image-choose' alt='' style=''>" +
                    "<input type='hidden' name='image-choose[]' value='" + files[i] + "'>" +
                    "<span data='" + i + "' class='remove-image'>X</span>" +
                    "</div>"


            $('#add-image').append(listImage);
            $('.remove-image').click(function () {
                $(this).parent().remove();
            });
        }
    };
    // window.open('http://localhost:8080/haimocweddingv4/js/kcfinder/browse.php?type=images',
    //     'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
    //     'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    // );
    window.open(getBaseURL() + 'js/kcfinder/browse.php?type=images',
        'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
})


function cutStringTitle(element) {
    var widthStr = element.width();
    var newString = '';
    if (widthStr > 600) {
        newString = element.html().substring(0, element.html().length - 1);
        element.html(newString);
        cutStringTitle(element);
    }
}

function cutStringDescription(element) {
    var descriptionLength = element.html().length;
    if (descriptionLength > 150) {
        element.html(element.html().substring(0, element.html().length - 1));
        cutStringDescription(element);
    }
}

function showErrorSEO(strKeyword, getidTitle, getidDescription) {
    var li = "";
    $("ul.error-notice").css("display", 'block');
    if (strKeyword.length > 3) {
        var listKeywords = strKeyword.trim().split(',');
        listKeywords.forEach(function (i, idx, array) {
            if (!isNullOrEmpty(i)) {
                if (getidTitle.html().toLowerCase().indexOf(i.trim()) != -1) {
                    var checkText = getidTitle.html().substring(0, i.length).toLowerCase();
                    if (checkText.indexOf(i.trim()) == -1) {
                        li += '<li class="near">Từ khóa [' + i.trim() + ']  chứa trong title nhưng không nằm đầu câu<li>';
                        return false;
                    } else {
                        li += '<li class="right">Từ khóa [' + i.trim() + '] chứa trong title<li>';
                        return false;
                    }
                    return false;
                } else {
                    li += '<li class="wrong">Từ khóa [' + i.trim() + '] không chứa trong title<li>';
                    return false;
                }
            }
        });
        listKeywords.forEach(function (i, idx, array) {
            if (!isNullOrEmpty(i)) {
                if (getidDescription.html().toLowerCase().indexOf(i.trim()) == -1) {
                    li += '<li class="wrong">Từ khóa [' + i.trim() + '] không chứa trong description<li>';
                } else {
                    li += '<li class="right">Từ khóa [' + i.trim() + '] chứa trong description<li>';
                }
            }
        });
        $("ul.error-notice").html(li);

    } else {
        $("ul.error-notice").html('');
    }
}

function change_alias(alias) {
    var str = alias;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
    str = str.replace(/ + /g, " ");
    str = str.trim();
    return str;
}

function replace_special_character_by_comma(alias) {
    var str = alias;
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, ",");
    return str;
}

function resetSentence() {
    var getidTitle = $("#seo-part .content .show-pattern .title");
    var getidDescription = $("#seo-part .content .show-pattern .description");
    var getidLink = $("#seo-part .content .show-pattern .link");
    if (getidTitle.html().length == 0) {
        getidTitle.html("Quick Brown Fox and The Lazy Dog - Demo Site")
    }
    if (getidDescription.html().length == 0) {
        getidDescription.html("The story of quick brown fox and the lazy dog. An all time classic children's fairy tale that is helping people with typography and web design.")
    }
    if (getidLink.html().length == 0) {
        getidLink.html("example.com/the-quick-brown-fox")
    }
    if ($("input[name='title']").length == 0) {
        getidLink.html("example.com/the-quick-brown-fox")
    }
}

function isNullOrEmpty(s) {
    return (s == null || s === "");
}
