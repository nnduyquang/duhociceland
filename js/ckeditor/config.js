/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.stylesSet.add( 'my_lightbox', [
    // Block-level styles
    { name: 'lightbox', element: 'a', styles: { 'color': 'Blue' } },
] );
CKEDITOR.editorConfig = function( config ) {
    config.entities_latin = false;
    config.allowedContent = true;
    config.extraPlugins = 'btgrid,lineheight';
    config.line_height="1;1.1;1.2;1.3;1.4;1.5" ;
    config.lineHeight_style = {
        element: 'p',
        styles: { 'line-height': '#(size)' },
        overrides: [ {
            element: 'line-height', attributes: { 'size': null }
        } ]
    };
    config.stylesSet = 'my_style'
};
CKEDITOR.stylesSet.add( 'my_style', [
    // Block-level styles
    { name: 'fancybox-group-1', element: 'a',attributes:{
        'data-fancybox':'gallery-gr1',
        'class':'fancybox'
    } },
    { name: 'fancybox-group-2', element: 'a',attributes:{
        'data-fancybox':'gallery-gr2',
        'class':'fancybox'
    } },
    { name: 'fancybox-group-3', element: 'a',attributes:{
        'data-fancybox':'gallery-gr3',
        'class':'fancybox'
    } },
    { name: 'fancybox-single', element: 'a',attributes:{
        'data-fancybox':'',
        'class':'fancybox'
    } },
] );

