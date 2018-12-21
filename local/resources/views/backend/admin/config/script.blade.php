<div class="tab-pane fade" id="import-script" role="tabpanel">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Chèn Script Trước @php  echo htmlentities("</body>"); @endphp :</strong>
            {!! Form::textarea('script-js-body',$cauhinhs['script-js-body'], array('placeholder' => 'Nội Dung','id'=>'description-script','class' => 'form-control','rows'=>'20','style'=>'resize:none')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Chèn Script Trước @php  echo htmlentities("</header>"); @endphp :</strong>
            {!! Form::textarea('script-js-header',$cauhinhs['script-js-header'], array('placeholder' => 'Nội Dung','id'=>'description-script','class' => 'form-control','rows'=>'20','style'=>'resize:none')) !!}
        </div>
    </div>
</div>