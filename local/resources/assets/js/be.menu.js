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