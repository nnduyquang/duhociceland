<div class="modal modal-info fade in" tabindex="-1" id="menu_item_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 id="m_hd_add" class="modal-title" style="display: none;"><i class="voyager-plus"></i> Create a New Menu Item</h4>
                <h4 id="m_hd_edit" class="modal-title" style=""><i class="voyager-edit"></i> Edit Menu Item</h4>
            </div>
            <form action="" id="m_form" method="POST" data-action-add="{{route('menu.store')}}" data-action-update="{{route('menu.update',['id'=>1])}}">
                {{csrf_field()}}
                <input id="m_form_method" type="hidden" name="_method" value="PUT">
                {{--<input type="hidden" name="_token" value="{{csrf_field()}}">--}}
                <div class="modal-body">
                    <label for="name">Title of the Menu Item</label>
                    <input type="text" class="form-control" id="m_title" name="title" placeholder="Title"><br>
                    <label for="type">Link type</label>
                    <select id="m_link_type" class="form-control" name="type">
                        <option value="url" selected="selected">Static URL</option>
                        <option value="route">Dynamic Route</option>
                    </select><br>
                    <div id="m_url_type" style="display: none;">
                        <label for="url">URL for the Menu Item</label>
                        <input type="text" class="form-control" id="m_url" name="url" placeholder="URL"><br>
                    </div>
                    <div id="m_route_type" style="">
                        <label for="route">Route for the menu item</label>
                        <input type="text" class="form-control" id="m_route" name="route" placeholder="Route"><br>
                        <label for="parameters">Route parameters (if any)</label>
                        <textarea rows="3" class="form-control" id="m_parameters" name="parameters" placeholder="{
    &quot;key&quot;: &quot;value&quot;
}"></textarea><br>
                    </div>
                    <label for="icon_class">Font Icon class for the Menu Item (Use a <a href="/admin/compass#fonts" target="_blank">Voyager Font Class</a>)</label>
                    <input type="text" class="form-control" id="m_icon_class" name="icon_class" placeholder="Icon Class (optional)"><br>
                    <label for="color">Color in RGB or Hex (optional)</label>
                    <input type="color" class="form-control" id="m_color" name="color" placeholder="Color, ex. #ffffff or rgb(255, 255, 255)"><br>
                    <label for="target">Open In</label>
                    <select id="m_target" class="form-control" name="target">
                        <option value="_self" selected="selected">Same Tab/Window</option>
                        <option value="_blank">New Tab/Window</option>
                    </select>
                    <input type="hidden" name="menu_id" value="1">
                    <input type="hidden" name="id" id="m_id" value="1">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success pull-right delete-confirm__" value="Update">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>