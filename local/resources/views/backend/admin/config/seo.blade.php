<div class="tab-pane fade" id="seo-homepage" role="tabpanel">
    <div id="seo-part" class="col-md-12 p-0">
        <h3>SEO</h3>
        <div class="content">
            <div class="show-pattern">
                <span class="title">Quick Brown Fox and The Lazy Dog - Demo Site</span>
                <span class="link">example.com/the-quick-brown-fox</span>
                <span class="description">The story of quick brown fox and the lazy dog. An all time classic children's fairy tale that is helping people with typography and web design.</span>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Từ khóa cần SEO</strong>
                    {!! Form::text('config-seo-keywords',$cauhinhs['config-seo-keywords'], array('placeholder' => 'keywords cách nhau dấu phẩy','class' => 'form-control')) !!}
                    <ul class="error-notice">
                    </ul>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <strong>Tiêu Đề (title):</strong>
                {!! Form::text('config-seo-title',$cauhinhs['config-seo-title'], array('placeholder' => 'Tên','class' => 'form-control')) !!}
            </div>
            <div class="col-md-12 form-group">
                <strong>Mô Tả (description):</strong>
                {!! Form::textarea('config-seo-description', $cauhinhs['config-seo-description'],array('placeholder' => '','id'=>'seo-description-post','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
            </div>
        </div>
        <h3>Mạng Xã Hội</h3>
        <div class="content">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Chọn hình đại diện hiển thị MXH: </strong>
                    @if($cauhinhs['config-seo-image']!='')
                        {!! Form::text('config-seo-image', url('/').'/'.$cauhinhs['config-seo-image'], array('class' => 'form-control','id'=>'pathImageMXH')) !!}
                    @else
                        {!! Form::text('config-seo-image', '', array('class' => 'form-control','id'=>'pathImageMXH')) !!}
                    @endif
                    <br>
                    {!! Form::button('Tìm', array('id' => 'btnBrowseImageMXH','class'=>'btn btn-primary')) !!}
                </div>
                <div class="form-group">
                    @if($cauhinhs['config-seo-image']!='')
                        {{ Html::image($cauhinhs['config-seo-image'],'',array('id'=>'showHinhMXH','class'=>'show-image'))}}
                    @else
                        {{ Html::image('','',array('id'=>'showHinhMXH','class'=>'show-image'))}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>