integratedCKEDITOR('description-post',height=200);
integratedCKEDITOR('content-post',height=800);
// integratedCKEDITOR('seo-description-post',height=200);
if ($('#btnBrowseImagePost').length) {
    var button1 = document.getElementById('btnBrowseImagePost');
    button1.onclick = function () {
        selectFileWithKCFinder('pathImagePost','showHinhPost');
    }
};
if ($('#btnBrowseImageMXH').length) {
    var button1 = document.getElementById('btnBrowseImageMXH');
    button1.onclick = function () {
        selectFileWithKCFinder('pathImageMXH','showHinhMXH');
    }
};