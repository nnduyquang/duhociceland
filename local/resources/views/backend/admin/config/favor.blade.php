<div class="tab-pane fade" id="favor-config" role="tabpanel">
    <div class="wrap-create-edit">
        <strong class="text-title-left">Thêm Hình Ưu Đãi</strong>
        <div class="wrap-create-edit">
            <strong class="text-title-right">Hình Ưu Đãi</strong>
            <div class="form-group">
                @if($cauhinhs['favor-image-config']!='')
                    {!! Form::text('favor-image-config', url('/').'/'.$cauhinhs['favor-image-config'], array('class' => 'form-control','id'=>'pathImagePost')) !!}
                @else
                    {!! Form::text('favor-image-config', '', array('class' => 'form-control','id'=>'pathImagePost')) !!}
                @endif
                <br>
                {!! Form::button('Tìm', array('id' => 'btnBrowseImagePost','class'=>'btn btn-primary')) !!}
            </div>
            <div class="form-group">
                @if($cauhinhs['favor-image-config']!='')
                    {{ Html::image($cauhinhs['favor-image-config'],'',array('id'=>'showHinhPost','class'=>'show-image'))}}
                @else
                    {{ Html::image('','',array('id'=>'showHinhPost','class'=>'show-image'))}}
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Link</strong>
                {!! Form::text('favor-link-config',  $cauhinhs['favor-link-config'], array('placeholder' => '','class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>