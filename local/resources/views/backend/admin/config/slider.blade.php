<div class="tab-pane fade" id="slider-config" role="tabpanel">
    <div class="wrap-create-edit">
        <strong class="text-title-left">Thêm Hình Thư Viện</strong>
        <div class="form-group">
            {!! Form::button('Thêm', array('id' => 'btnBrowseMore','class'=>'btn btn-primary')) !!}
        </div>

        <div class="form-group">
            <div id="add-image" class="row">
                @php
                    $listImage=explode(';',$cauhinhs['slider-config']);
                @endphp
                @foreach($listImage as $key=>$item)
                    <div class="col-md-3 text-center one-image">
                        {{ Html::image($item,'',array('id'=>'showHinh','class'=>'image-choose'))}}
                        {{ Form::hidden('image-choose[]', $item) }}
                        <span class='remove-image'>X</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>