if ($('#btnBrowseImageMobile').length) {
    var button1 = document.getElementById('btnBrowseImageMobile');
    button1.onclick = function () {
        selectFileWithKCFinder('pathImageMobile','showHinhMobile');
    }
}