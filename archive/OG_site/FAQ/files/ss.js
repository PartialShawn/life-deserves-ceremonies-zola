// SpiffY!Search, v1.10, 3/18/2006
// copyright (c) Kent Brewster, 2006
// feel free to use or abuse this code, BUT:
//
// - leave these credits intact
// - leave the "help" link alone
// - leave the API key set to SpiffySearch
//
// I'd also love to hear from you; please
// contact me via http://www.mindsack.com/

var obj =
{
	kickstart : function()
	{
		obj.id = 'ss';
		// delete this line if you don't want autofill
		obj.autoFillTag = 'B';
		// you can automagically get your default domain
		obj.defaultDomain = obj.getDomain(document.location + '?');
		// OR specify one here
		obj.defaultDomain = 'mindsack.com';
		// results per page
		// 100 = max ... more than 10 will be slow
		obj.resultsPerPage = 10;
		obj.skinnyLimit = 190;
		// messing with anything else may cause trouble!
		obj.f = document.getElementById(obj.id);
		obj.f.innerHTML = '';
		obj.f.id = obj.id;
		obj.f.action='#';
		obj.f.onkeypress = obj.disableCr;
		obj.resultSet = 0;
		obj.lastQuery = '';
		obj.lastDomain = obj.defaultDomain;
		obj.searchMode = ['yahooSearch', 'yahooNews'];
		obj.searchUrl = ['http://api.search.yahoo.com/WebSearchService/V1/webSearch', 'http://api.search.yahoo.com/NewsSearchService/V1/newsSearch'];
		var s = document.createElement('script');
		obj.s = obj.id + '_s';
		s.setAttribute('type','text/javascript');
		s.setAttribute('charset', 'utf-8');
		document.getElementsByTagName('head')[0].appendChild(s);
		obj.f.y = document.createElement('a');
		obj.f.y.mode = 0;
		obj.f.y.className = 'yahooSearch';
		obj.f.y.onclick = obj.toggleSearch;
		obj.f.appendChild(obj.f.y);		
		obj.f.r = document.createElement('input');
		obj.f.r.type = 'checkbox';
		obj.f.r.id = obj.id + '_r';
		obj.f.r.onclick = obj.toggleRestrict;
		obj.f.appendChild(obj.f.r);
		obj.f.d = document.createElement('input');
		obj.f.d.id = obj.id + '_d';
		obj.f.d.style.width = obj.f.offsetWidth - 10 + 'px';
		obj.f.d.value = obj.defaultDomain;
		obj.f.appendChild(obj.f.d);
		obj.f.q = document.createElement('input');
		obj.f.q.id = obj.id + '_q';
		obj.f.q.type = 'text';
		obj.f.q.autocomplete = 'off';
		obj.f.q.style.width = obj.f.offsetWidth - 10 + 'px';
		obj.f.appendChild(obj.f.q);
		obj.f.a = document.createElement('dl');
		obj.f.a.id = obj.id + '_a';
		obj.f.appendChild(obj.f.a);
		obj.f.u = document.createElement('p');
		obj.f.u.id = obj.id + '_u';
		obj.f.appendChild(obj.f.u);
		obj.f.h = document.createElement('a');
		obj.f.h.href = "http://www.mindsack.com/uxe/SpiffySearch";
		obj.f.h.innerHTML = 'help';
		obj.f.h.style.display = 'block';
		obj.f.h.style.margin = '3px';
		obj.f.h.style.textAlign = 'right';
		obj.f.appendChild(obj.f.h);
		if (obj.f.offsetWidth < 100)
		{
			obj.f.style.display = 'none';
		}
		else
		{
			if (obj.f.offsetWidth > obj.skinnyLimit)
			{
				var w = (obj.f.offsetWidth / 2) - 12;
				obj.f.d.style.width = w + 'px';
				obj.f.r.style.left = obj.f.offsetWidth - w - 24 + 'px';
			}
			else
			{
				obj.f.d.style.display = 'none';
				obj.f.r.style.display = 'none';
			}
			obj.f.a.style.width = obj.f.offsetWidth - 10 + 'px';
			obj.f.q.style.width = obj.f.offsetWidth - 10 + 'px';
			obj.f.onmouseover = obj.mouseOver;
			obj.f.onmouseout = obj.mouseOut;
			obj.f.onmouseup = obj.mouseUp;
			setInterval("obj.doStuff()", 500);
		}
		if (obj.autoFillTag)
		{
		    theKids = document.getElementsByTagName(obj.autoFillTag);
		    for (var i=0; i<theKids.length; i++)
		    {
		        theKids[i].style.cursor = 'pointer';
		        theKids[i].onmouseover = obj.stuffQuery;
		    }
		}		
	},
	toggleSearch : function()
	{
		obj.f.y.mode = (obj.f.y.mode + 1) % obj.searchMode.length;
		obj.f.y.className = obj.searchMode[obj.f.y.mode];
		obj.resultSet = 0;
		obj.runSearch();
	},
	toggleRestrict : function()
	{
		if (obj.f.q.value)
		{
			obj.resultSet = 0;
			obj.runSearch();
		}
	},
	mouseOver : function(v)
	{
		el = obj.getEl(v);
		if (el.className.match(/searchResult/))
		{
			obj.getNextSibling(el).style.display = 'block';
		}
		if (el.parentNode.className.match(/searchResult/))
		{
			obj.getNextSibling(el.parentNode).style.display = 'block';
		}
	},
	mouseOut : function(v)
	{
		el = obj.getEl(v);
		if (el.className.match(/searchResult/))
		{
			obj.getNextSibling(el).style.display = 'none';
		}
		if (el.parentNode.className.match(/searchResult/))
		{
			obj.getNextSibling(el.parentNode).style.display = 'none';
		}
	},
	mouseUp : function(v)
	{
		el = obj.getEl(v);
		if (el.id == obj.f.id + '_nx')
		{
			obj.resultSet += obj.resultsPerPage;
			obj.runSearch();
		}	
		if (el.id == obj.f.id + '_pr')
		{
			obj.resultSet -= obj.resultsPerPage;
			obj.runSearch();
		}	
		if (el.className == 'relatedTerm')
		{
			obj.f.q.value = el.innerHTML;
			obj.resultSet = 0;
			obj.runSearch();
		}	
		if (el.id == obj.f.id + '_yh')
		{
			var site = '';
			if (obj.f.r.checked)
			{
				site = '&vs=' + obj.f.d.value;
			}
    			var url = 'http://search.yahoo.com/search?p=' + obj.f.q.value + '&b=' + obj.resultSet + site;
    			window.open(url,'search','',0);		
		}
		if (el.className == 'addToMyWeb')
		{
			var ns = obj.getNextSibling(obj.getEl(v));
			var url = 'http://myweb2.search.yahoo.com/myresults/bookmarklet?t=';
			url += escape(ns.innerHTML);
			url += '&u=';
			url += escape(ns.name);
			url += '&tag=';
			var tags = obj.f.q.value;
			url += escape(tags);	
			url += '&ei=UTF-8';
			window.open(url,'popup','width=520px,height=420px,status=0,location=0,resizable=1,scrollbars=1,left=100,top=50',0);
		}	
		else
		{
			if (el.className.match(/searchResult/) || el.parentNode.className.match(/searchResult/))
			{
				v = v || window.event;
				if (v.shiftKey)
				{
					obj.f.r.click();
					obj.f.d.value = obj.getDomain(el.name);
					resultSet = 0;
					obj.runSearch();
				}
				else
				{
					window.open(el.name,'_vu');
				}
			}
		}
	},
	stuffQuery : function(v)
	{
		el = obj.getEl(v);
		if (el.innerHTML != obj.lastQuery)
		{
			obj.f.q.value = el.innerHTML;
			obj.runSearch();
		}
	},
	getEl : function(v)
	{
		var tg = (v) ? v : event;
		if (tg.target)
		{
			var el = (tg.target.nodeType == 3) ? tg.target.parentNode : tg.target;
		}
		else
		{
			var el = tg.srcElement;
		}
		return el;
	},
	getNextSibling : function(el)
	{
		var nextSib = el.nextSibling;
		if (nextSib && nextSib.nodeType != 1)
		{
			nextSib = nextSib.nextSibling;
		}
		return nextSib;
	},
	doStuff : function()
	{
		if (obj.f.q.value)
		{
			if (obj.lastQuery != obj.f.q.value)
			{
				obj.runSearch();
			}
		}
		else
		{
			if (obj.lastQuery)
			{
				obj.f.a.innerHTML = '';
			}
		}
		if (obj.f.d.value != obj.lastDomain && obj.f.r.checked)
		{
			obj.lastDomain = obj.f.d.value;
			obj.runSearch();
		}
	},
	disableCr : function(v)
	{
		if (v)
		{
			var k = v.which;
		}
		else
		{
			var k = window.event.keyCode;
		}
		return k!=13;
	},
	runSearch : function()
	{
		obj.lastQuery = obj.f.q.value;
		var startingRecord = '&start=' + obj.resultSet;
		var restrictDomain = '';
	//	if (obj.f.r.checked && obj.f.d.value)
	//	{
	//		restrictDomain = '&site=' + obj.f.d.value;
	//	}
		aPath=document.location.pathname;
		aPathArray=aPath.split("/");
		aPathArray.pop();
		aNewPath=aPathArray.join("/");
		
		var url = obj.searchUrl[obj.f.y.mode] + '?appid=SpiffySearch&language=en&query=' + obj.f.q.value + ' site:'+ document.location.host + ' inurl:'+aNewPath  + startingRecord + restrictDomain + '&results=' + obj.resultsPerPage + '&output=json&callback=obj.pingSearch';
		
		//var url = obj.searchUrl[obj.f.y.mode] + '?appid=SpiffySearch&language=en&query=' + obj.f.q.value + startingRecord + restrictDomain + '&results=' + obj.resultsPerPage + '&output=json&callback=obj.pingSearch';
		obj.runScript(url);
	},
	pingSearch : function(r)
	{
		obj.f.a.innerHTML = '';
		var nav = document.createElement('dt');
		nav.id = obj.f.id + '_n';
		var yh = document.createElement('a');
		yh.id = 'ss_yh';
		yh.title = 'Visit Yahoo! search for these results.';
		if (obj.f.offsetWidth > obj.skinnyLimit)
		{
			yh.innerHTML = 'from the Web';
			if (obj.f.d.value && obj.f.r.checked)
			{
				yh.innerHTML = obj.f.d.value;
			}
		}
		else
		{
			yh.innerHTML = 'Y!';
		}
		nav.appendChild(yh);
		if (obj.resultSet)
		{
			var pr = document.createElement('a');
			pr.id = 'ss_pr';
			pr.innerHTML = '&laquo;';
			pr.title = 'Previous Results';
			nav.appendChild(pr);
		}
		if (parseInt(r.ResultSet.totalResultsAvailable) > parseInt(r.ResultSet.firstResultPosition) + obj.resultsPerPage)
		{
			var nx = document.createElement('a');
			nx.id = 'ss_nx';
			nx.innerHTML = '&raquo;';
			nx.title = 'Next Results';
			nav.appendChild(nx);
		}
		obj.f.a.appendChild(nav);
		if (r.ResultSet.totalResultsReturned)
		{
			for (var i = 0; i< r.ResultSet.totalResultsReturned; i++)
			{
				if (r.ResultSet.Result[i] && r.ResultSet.Result[i].Url && r.ResultSet.Result[i].Title)
				{
					var item = document.createElement('dt');
					item.className = 'searchResult';
					item.name = r.ResultSet.Result[i].Url;
					if (i % 2) { item.className += ' odd' };
					item.style.zIndex = i;
                			var img = document.createElement('a');
                			img.className = 'addToMyWeb';
                			img.title = 'Add to My Web';
                			item.appendChild(img);
				
					var link = document.createElement('a');
                			link.className = 'resultTitle';
					link.name = r.ResultSet.Result[i].Url;
					link.innerHTML = r.ResultSet.Result[i].Title;
					item.appendChild(link);
					obj.f.a.appendChild(item);
					var dd = document.createElement('dd');
					dd.style.display = 'none';
					dd.style.zIndex = i + 100;
					dd.innerHTML = '<h4>' + r.ResultSet.Result[i].Title + '</h4>' + r.ResultSet.Result[i].Summary;
					var d = obj.getDomain(r.ResultSet.Result[i].Url);
					if (!obj.f.r.checked)
					{
						dd.innerHTML += '<p>Shift-click to restrict results to ' + d + '</p>';
					}
					else
					{
						dd.innerHTML += '<p>Shift-click to show results from all domains.</p>';
					}
					item.appendChild(dd);
					obj.f.a.appendChild(dd);
				}
			}
			if (!obj.resultSet)
			{
				obj.runRelated();
			}
		}
		else
		{
			obj.f.a.innerHTML = '<dt>Nothing found, sorry!</dt>';
		}
		obj.lastQuery = obj.f.q.value;
	},
	runRelated : function()
	{
		var url = 'http://api.search.yahoo.com/WebSearchService/V1/relatedSuggestion?appid=SpiffySearch&query=' + obj.f.q.value + '&output=json&callback=obj.pingRelated';
		obj.runScript(url);
	},
	pingRelated : function(r)
	{
		obj.f.u.innerHTML = '';
		if (r.ResultSet)
		{
			if (r.ResultSet.Result.length)
			{
				obj.f.u.appendChild(document.createTextNode('See Also: '));
				for (var i = 0; i < r.ResultSet.Result.length; i++)
				{
					if (i)
					{
						obj.f.u.appendChild(document.createTextNode(', '));
					}
					var t = document.createElement('a');
					t.innerHTML = r.ResultSet.Result[i];
					t.className = 'relatedTerm';
					obj.f.u.appendChild(t);	
				}
			}		
		}
	},
	goThere : function(url)
	{
		window.open(url, '_vu');
	},
	runScript : function(url)
	{
		var remoteScript=document.createElement('script');
		remoteScript.id = obj.s;
		remoteScript.setAttribute('type','text/javascript');
		remoteScript.setAttribute('charset', 'utf-8');
		remoteScript.setAttribute('src', url);
		document.getElementsByTagName('head')[0].appendChild(remoteScript);
	},
	removeScript : function(id)
	{
		document.getElementsByTagName('head')[0].removeChild(obj.s);
	},
	getDomain : function(url)
	{
		var h = url.split('?');
		var i = h[0].split('//');
		var j = i[1].split('/');
		var k = j[0].split('.');
		var t = k[k.length-2] + '.' + k[k.length-1];
		if ((k[k.length-1].length) == 2)
		{
		t = k[k.length-3] + '.' + t;
		}
		return t;
	},
	showDetails : function(id)
	{
	    document.getElementById(id).style.display = 'block';
	},
	hideDetails : function(id)
	{
	    document.getElementById(id).style.display = 'none';
	}	    
}
window.onload=obj.kickstart;
