function bzGetFlashPlayerBZ9014030809694CD19F77() {
	var div = document.getElementById('SWBZ9014030809694CD19F77');
	if (div) {
		div.innerHTML = '<p style="background-color:#ffffff;color:#000000;padding:1em;">You have an old version of Flash Player. <a href="http://www.adobe.com/go/getflash/" target="_top">Get the latest Flash player.</a></p>';
	} else {
		alert("no SWBZ9014030809694CD19F77 div");
	}
}
function bzEmbedSWFBZ9014030809694CD19F77() {
	if (swfobject.hasFlashPlayerVersion("9.0.45")) {
		var flashvars = {
			swfId: "SWBZ9014030809694CD19F77",
			xmlPath: _urlBZ9014030809694CD19F77 + "/bz.xml",
			imgPath: _urlBZ9014030809694CD19F77 + "/img",
			urlType: "_top",
			showInfo: "1",
			themeMode: "2"
		};
		var params = {
			wmode: "transparent",
			allowscriptaccess: "always"
		};
		var attributes = {};
		swfobject.embedSWF(_urlBZ9014030809694CD19F77 + "/bzAnimation.swf", "SWBZ9014030809694CD19F77", "900", "200", "9.0.45", false, flashvars, params, attributes);
	} else {
		swfobject.addDomLoadEvent(bzGetFlashPlayerBZ9014030809694CD19F77);
	}
}
bzEmbedSWFBZ9014030809694CD19F77();
