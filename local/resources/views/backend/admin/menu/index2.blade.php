<div id="be-menu">
    <h1 class="page-title">
        <i class="voyager-list"></i>Menu Builder (admin)
        <div class="btn btn-success add_item"><i class="voyager-plus"></i> New Menu Item</div>
    </h1>
    <div class="dd" id="nestable">
        @include('backend.admin.menu.list-menu-item')
    </div>
</div>
@include('backend.admin.menu.modal.delete-menu')
@include('backend.admin.menu.modal.edit-add-menu')

