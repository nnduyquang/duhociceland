var token = $('meta[name="csrf-token"]').attr('content');function getBaseURL() {    var url = location.href;  // entire url including querystring - also: window.location.href;    var baseURL = url.substring(0, url.indexOf('/', 14));    if (baseURL.indexOf('http://localhost') != -1) {        // Base Url for localhost        var url = location.href;  // window.location.href;        var pathname = location.pathname;  // window.location.pathname;        var index1 = url.indexOf(pathname);        var index2 = url.indexOf("/", index1 + 1);        var baseLocalUrl = url.substr(0, index2);        return baseLocalUrl + "/";    }    else {        // Root Url for domain name        return baseURL + "/";    }}function selectFileWithKCFinder(elementPath, showHinhId) {    window.KCFinder = {        callBack: function (url) {            var output = document.getElementById(elementPath);            output.value = url;            $('#' + showHinhId).show();            $('#' + showHinhId).fadeIn("fast").attr('src', url);            window.KCFinder = null;        }    };    window.open('http://localhost:8080/duhociceland/js/kcfinder/browse.php?type=images', 'kcfinder_textbox',        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +        'resizable=1, scrollbars=0, width=800, height=600'    );    if ($('#' + elementPath).val() == '')        $('#' + showHinhId).hide();    else        $('#' + showHinhId).show();}function integratedCKEDITOR(elementID, height) {    var url = 'http://localhost:8080/duhociceland';    if ($('#' + elementID).length) {        var editor1 = CKEDITOR.replace(elementID, {            height: height,            language: 'vi',            format_tags: 'p;h1;h2;h3;pre',            filebrowserBrowseUrl: 'http://localhost:8080/duhociceland/js/kcfinder/browse.php?type=files',            filebrowserImageBrowseUrl: 'http://localhost:8080/duhociceland/js/kcfinder/browse.php?type=images',            filebrowserFlashBrowseUrl: 'http://localhost:8080/duhociceland/js/kcfinder/browse.php?type=flash',            filebrowserUploadUrl: 'http://localhost:8080/duhociceland/js/kcfinder/upload.php?type=files',            filebrowserImageUploadUrl: 'http://localhost:8080/duhociceland/js/kcfinder/upload.php?type=images',            filebrowserFlashUploadUrl: 'http://localhost:8080/duhociceland/js/kcfinder/upload.php?type=flash',            extraAllowedContent: 'div',            extraPlugins : 'image2',            image2_disableResizer : true        });        editor1.on('dialogDefinition',function(ev){            var dialogName = ev.data.name;            var dialogDefinition = ev.data.definition;            if (dialogName == 'image2') {                var infoTab = dialogDefinition.getContents( 'info' );                // infoTab.set('width','100%');                // infoTab.set('height','100%');                infoTab.get('width').validate = function() {                    return true; //more advanced validation rule should be used here                }                infoTab.get('height').validate = function() {                    return true; //more advanced validation rule should be used here                }            }        });        CKEDITOR.on("instanceCreated", function (ev) {            ev.editor.on("widgetDefinition", function (evt) {                var widgetData = evt.data;                if (widgetData.name != "image" || widgetData.dialog != "image") return;                //Override of upcast                if (!widgetData.stdUpcast) {                    widgetData.stdUpcast = widgetData.upcast;                    widgetData.upcast = function (el, data) {                        var el = widgetData.stdUpcast(el, data);                        if (!el) return el;                        var attrsHolder = el.name == 'a' ? el.getFirst() : el;                        var attrs = attrsHolder.attributes;                        if (el && el.name == "img") {                            if (el.styles) {                                attrs.width = (el.styles.width + "").replace('px', '');                                attrs.height = (el.styles.height + "").replace('px', '');                                // delete el.styles.width;                                // delete el.styles.height;                                // attrs.style = CKEDITOR.tools.writeCssText(el.styles);                            }                        }                        return el;                    }                }                //Override of downcast                if (!widgetData.stdDowncast) {                    widgetData.stdDowncast = widgetData.downcast;                    widgetData.downcast = function (el) {                        el = this.stdDowncast(el);                        var attrsHolder = el.name == 'a' ? el.getFirst() : el;                        var attrs = attrsHolder.attributes;                        var realWidth, realHeight;                        var widgets = ev.editor.widgets.instances;                        for (widget in widgets) {                            if (widgets[widget].name != "image" || widgets[widget].dialog != "image2") {                                continue;                            }                            realWidth = $(widgets[widget].element.$).width();                            realHeight = $(widgets[widget].element.$).height();                        }                        var style = CKEDITOR.tools.parseCssText(attrs.style)                        if (attrs.width) {                            // style.width = realWidth + "px";                            attrs.width='100%';                            // delete attrs.width;                        }                        if (attrs.height) {                            // style.height = realHeight + "px";                            attrs.height='100%';                            // delete attrs.height;                        }                        // attrs.style = CKEDITOR.tools.writeCssText(style);                        return el;                    }                }            });        });        editor1.on('instanceReady', function () {            // Output self-closing tags the HTML4 way, like <br>.            this.dataProcessor.writer.selfClosingEnd = '>';            // Use line breaks for block elements, tables, and lists.            var dtd = CKEDITOR.dtd;            for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {                this.dataProcessor.writer.setRules(e, {                    indent: true,                    breakBeforeOpen: true,                    breakAfterOpen: true,                    breakBeforeClose: true,                    breakAfterClose: true                });            }            // Start in source mode.            // this.setMode('source');        });    }}function integrateSearch(elementID,formID){    $('#'+elementID).click(function () {        if ($('#txtSearch').val().trim() == '')            return;        if ($('#txtSearch').val().trim().replace(/ +(?= )/g, '') == $("input[name='hdKeyword']").val())            return;        $('#'+formID).submit();    });}function isEmpty(val) {    return ((val !== '') && (val !== undefined) && (val.length > 0) && (val !== null));}