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

// integratedCKEDITOR('description-page',height=200);
integratedCKEDITOR('content-page',height=800);
// integratedCKEDITOR('seo-description-page',height=200);


// =========================================================
// if ($('#btnBrowseImagePage').length) {
//     var button1 = document.getElementById('btnBrowseImagePage');
//     button1.onclick = function () {
//         selectFileWithKCFinder('pathImagePage','showHinhPage');
//     }
// }
// =========================================================
integratedCKEDITOR('description-post',height=200);
integratedCKEDITOR('content-post',height=800);
// integratedCKEDITOR('seo-description-post',height=200);
if ($('#btnBrowseImagePost').length) {
    var button1 = document.getElementById('btnBrowseImagePost');
    button1.onclick = function () {
        selectFileWithKCFinder('pathImagePost','showHinhPost');
    }
};
if ($('#btnBrowseImageMXH').length) {
    var button1 = document.getElementById('btnBrowseImageMXH');
    button1.onclick = function () {
        selectFileWithKCFinder('pathImageMXH','showHinhMXH');
    }
};
$(document).ready(function()
{

    $('#nestable').nestable({
        group: 1
    });
    var $m_modal       = $('#menu_item_modal'),
        $m_hd_add      = $('#m_hd_add').hide().removeClass('hidden'),
        $m_hd_edit     = $('#m_hd_edit').hide().removeClass('hidden'),
        $m_form        = $('#m_form'),
        $m_form_method = $('#m_form_method'),
        $m_title       = $('#m_title'),
        $m_title_i18n  = $('#title_i18n'),
        $m_url_type    = $('#m_url_type'),
        $m_url         = $('#m_url'),
        $m_link_type   = $('#m_link_type'),
        $m_route_type  = $('#m_route_type'),
        $m_route       = $('#m_route'),
        $m_parameters  = $('#m_parameters'),
        $m_icon_class  = $('#m_icon_class'),
        $m_color       = $('#m_color'),
        $m_target      = $('#m_target'),
        $m_id          = $('#m_id');
    $('.item_actions').on('click', '.delete', function (e) {
        id = $(e.currentTarget).data('id');
        $('#delete_form')[0].action = $('#delete_form')[0].action.replace("__id",id);
        $('#delete_modal').modal('show');
    });
    $('.add_item').click(function() {
        $m_form.trigger('reset');
        $m_modal.modal('show', {data: null});
    });
    $m_modal.on('show.bs.modal', function(e, data) {
        var _adding      = e.relatedTarget.data ? false : true,
            translatable = $m_modal.data('multilingual'),
            $_str_i18n   = '';

        if (_adding) {
            $m_form.attr('action', $m_form.data('action-add'));
            $m_form_method.val('POST');
            $m_hd_add.show();
            $m_hd_edit.hide();
            $m_target.val('_self').change();
            $m_link_type.val('url').change();
            $m_url.val('');
            $m_icon_class.val('');

        } else {
            $m_form.attr('action', $m_form.data('action-update'));
            $m_form_method.val('PUT');
            $m_hd_add.hide();
            $m_hd_edit.show();

            var _src = e.relatedTarget.data, // the source
                id   = _src.data('id');

            $m_title.val(_src.data('title'));
            $m_url.val(_src.data('url'));
            $m_route.val(_src.data('route'));
            $m_parameters.val(JSON.stringify(_src.data('parameters')));
            $m_icon_class.val(_src.data('icon_class'));
            $m_color.val(_src.data('color'));
            $m_id.val(id);

            // if(translatable){
            //     $_str_i18n = $("#title" + id + "_i18n").val();
            // }

            if (_src.data('target') == '_self') {
                $m_target.val('_self').change();
            } else if (_src.data('target') == '_blank') {
                $m_target.find("option[value='_self']").removeAttr('selected');
                $m_target.find("option[value='_blank']").attr('selected', 'selected');
                $m_target.val('_blank');
            }
            if (_src.data('route') != "") {
                $m_link_type.val('route').change();
                $m_url_type.hide();
            } else {
                $m_link_type.val('url').change();
                $m_route_type.hide();
            }
            if ($m_link_type.val() == 'route') {
                $m_url_type.hide();
                $m_route_type.show();
            } else {
                $m_route_type.hide();
                $m_url_type.show();
            }
        }

        if (translatable) {
            $m_title_i18n.val($_str_i18n);
            translatable.refresh();
        }
    });

    $('.item_actions').on('click', '.edit', function (e) {
        $m_modal.modal('show', {data: $(e.currentTarget)});
    });
    $m_link_type.on('change', function (e) {
        if ($m_link_type.val() == 'route') {
            $m_url_type.hide();
            $m_route_type.show();
        } else {
            $m_url_type.show();
            $m_route_type.hide();
        }
    });

    $('#nestable').on('change', function (e) {
        // $.post('{{ route("menus.order",["menu" => $menu->id]) }}', {
        //     order: JSON.stringify($('#nestable').nestable('serialize')),
        //     _token: '{{ csrf_token() }}'
        // }, function (data) {
        //     toastr.success("{{ __('voyager::menu_builder.updated_order') }}");
        // });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data = new FormData($(this).get(0));
        data.append('data',JSON.stringify($('#nestable').nestable('serialize')));
        $.ajax({
            type: "POST",
            url: getBaseURL()+"sml_admin/menu/order-menu",
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false
            // success: function(msg) {
            //     var msg = $.parseJSON(msg);
            //     if(msg.success=='yes')
            //     {
            //         return true;
            //     }
            //     else
            //     {
            //         alert('Server error');
            //         return false;
            //     }
            // }
        });
    });


});
integratedCKEDITOR('description-content',height=200);
integratedCKEDITOR('description-signatures',height=200);
if ($('#btnBrowseImageMobile').length) {
    var button1 = document.getElementById('btnBrowseImageMobile');
    button1.onclick = function () {
        selectFileWithKCFinder('pathImageMobile','showHinhMobile');
    }
}