// integratedCKEDITOR('description-post',height=200);
integratedCKEDITOR('content-post',height=800);
// integratedCKEDITOR('seo-description-post',height=200);
// if ($('#btnBrowseImageProduct').length) {
//     var button1 = document.getElementById('btnBrowseImageProduct');
//     button1.onclick = function () {
//         selectFileWithKCFinder('pathImageProduct','showHinhProduct');
//     }
// };
$('.ulti-copy').click(function(){
    var selected = [];
    $('input[type=checkbox][name=id\\[\\]]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).val());
        }
    });
    if(selected.length!=0)
    {
        $('input[name=listID]').val(selected);
        alert('Đã lưu sản phẩm');
    }
    else{
        alert('Mời bạn chọn sản phẩm');
    }
    console.log(selected);
    // alert(id[0]);
});

