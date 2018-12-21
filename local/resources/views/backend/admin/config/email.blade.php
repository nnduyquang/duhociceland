<div class="tab-pane fade" id="email-config" role="tabpanel">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Email Nhận Thông Tin:</strong>
                    {!! Form::text('email-receive', $cauhinhs['email-receive'], array('placeholder' => '','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Tiêu Đề Email Khách Hàng Nhận Phản Hồi:</strong>
                    {!! Form::text('email-sender-subject', $cauhinhs['email-sender-subject'], array('placeholder' => '','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>From Email Khách Hàng Nhận Phản Hồi:</strong>
                    {!! Form::text('email-sender-from', $cauhinhs['email-sender-from'], array('placeholder' => '','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Tiêu Đề Email Nhận Thông Tin Từ Khách Hàng:</strong>
                    {!! Form::text('email-receive-subject',  $cauhinhs['email-receive-subject'], array('placeholder' => '','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>From Email Nhận Thông Tin Khách Hàng:</strong>
                    {!! Form::text('email-receive-from',  $cauhinhs['email-receive-from'], array('placeholder' => '','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nội Dung Gửi Cho Khách Hàng:</strong>
                    {!! Form::textarea('email-sender-content',$cauhinhs['email-sender-content'], array('placeholder' => 'Nội Dung','id'=>'description-content','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chữ Ký Mail:</strong>
                    {!! Form::textarea('email-signatures', $cauhinhs['email-signatures'], array('placeholder' => 'Nội Dung','id'=>'description-signatures','class' => 'form-control','rows'=>'10','style'=>'resize:none')) !!}
                </div>
            </div>
        </div>
    </div>
</div>