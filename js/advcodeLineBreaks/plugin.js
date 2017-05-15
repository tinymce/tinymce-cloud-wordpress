/**
  Copyright 2012-2017 Andrew Ozz
  Copyright 2017 Michael Fromin <michael.fromin@ephox.com>

  The following code is a derivative work of the code from the TinyMCE Advanced project,
  which is licensed GPLv2. This code therefore is also licensed under the terms
  of the GNU Public License, version 2.
 */
( function( tinymce ) {
	tinymce.PluginManager.add( 'advcodeLineBreaks', function( editor ) {

		function addLineBreaks( html ) {
			var blocklist = 'table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre' +
				'|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|legend|section' +
				'|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary';

			html = html.replace( new RegExp( '<(?:' + blocklist + ')(?: [^>]*)?>', 'gi' ), '\n$&' );
			html = html.replace( new RegExp( '</(?:' + blocklist + ')>', 'gi' ), '$&\n' );
			html = html.replace( /(<br(?: [^>]*)?>)[\r\n\t]*/gi, '$1\n' );
			html = html.replace( />\n[\r\n\t]+</g, '>\n<' );
			html = html.replace( /^<li/gm, '\t<li' );
			html = html.replace( /<td>\u00a0<\/td>/g, '<td>&nbsp;</td>' );

			return tinymce.trim(html);
		}

		editor.on( 'init', function() {
            editor.on( 'getContent', function( event ) {
                event.content = event.content.replace( /caption\](\s|<br[^>]*>|<p>&nbsp;<\/p>)*\[caption/g, 'caption] [caption' );
                event.content = event.content.replace( /<(object|audio|video)[\s\S]+?<\/\1>/g, function( match ) {
                    return match.replace( /[\r\n\t ]+/g, ' ' );
                });
                event.content = event.content.replace( /<pre( [^>]*)?>[\s\S]+?<\/pre>/g, function( match ) {
                    match = match.replace( /<br ?\/?>(\r\n|\n)?/g, '\n' );
                    return match.replace( /<\/?p( [^>]*)?>(\r\n|\n)?/g, '\n' );
                });
                event.content = addLineBreaks( event.content );
            }, true );
		});

		return {
			addLineBreaks: addLineBreaks
		};
	});
}( window.tinymce ));
