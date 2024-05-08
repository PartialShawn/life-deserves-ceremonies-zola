if( !_urlBZ9014030809694CD19F77 ) {
	var _urlBZ9014030809694CD19F77 = null;
	var scripts = document.getElementsByTagName("script");
	for( var i=0;i<scripts.length;i++ ) {
		var s = scripts[i];
		if( s.src && s.src.match(/\/bzLoader\.js/) ) {
			var _urlBZ9014030809694CD19F77 = s.src.substring(0,s.src.length-11);		
		}
	}
}
var _scriptsBZ9014030809694CD19F77 = new Array();
_scriptsBZ9014030809694CD19F77[0] = 'swfobject.js';
_scriptsBZ9014030809694CD19F77[1] = 'bz.js';
for( var i=0;i<_scriptsBZ9014030809694CD19F77.length;i++ ) {
	var urlC = _urlBZ9014030809694CD19F77+_scriptsBZ9014030809694CD19F77[i];
	document.write('<script type="text/javascript" src="'+ urlC +'"><\/script>');
}