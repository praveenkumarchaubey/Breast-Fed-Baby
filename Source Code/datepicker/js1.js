(function() {
	function addEvent(el, on, fn) {
		if (el.addEventListener) {
			el.addEventListener(on, fn, false);
		} else if (el.attachEvent) {
			el.attachEvent("on" + on, fn);
		}
	}
	function addClass(el, cn) {
		var c0 = (" " + el.className + " ").replace(/\s+/g, " "),
			c1 = (" " + cn + " ").replace(/\s+/g, " ");
		if (c0.indexOf(c1) < 0) {
			el.className = (c0 + c1).replace(/\s+/g, " ").replace(/^ | $/g, "");
		}
	}
	function removeClass(el, cn) {
		var c0 = (" " + el.className + " ").replace(/\s+/g, " "),
			c1 = (" " + cn + " ").replace(/\s+/g, " ");
		if (c0.indexOf(c1) >= 0) {
			el.className = c0.replace(c1, " ").replace(/\s+/g, " ").replace(/^ | $/g, "");
		}
	}
	function ajaxRequest(url, fn) {
		var xhr = new XMLHttpRequest();
		if (fn) {
			xhr.onreadystatechange = function() {
				if (this.readyState === 4) {
					if (this.status === 200) {
						fn.call(this);
					}
				}
			};
		}
		xhr.open("GET", url, true);
		xhr.send();
	}
	function loadScript(url, fn) {
		var e = document.createElement("script");
		e.type = "text/javascript";
		e.src = url;
		document.documentElement.firstChild.appendChild(e);
		if (fn) {
			e.onload = e.onreadystatechange = function() {
				if (!this.readyState || this.readyState === "complete" || this.readyState === "loaded") {
					e.onload = e.onreadystatechange = null;
					fn.call(this);
				}
			};
		}
	}
	function loadCSS(url) {
		var e = document.createElement("link");
		e.type = "text/css";
		e.rel = "stylesheet";
		e.href = url;
		document.documentElement.firstChild.appendChild(e);
	}
	addEvent(window, "load", function() {
		var div_demoengine, a_output, a_source, a_popout, div_source;
		div_demoengine = document.createElement("div");
		div_demoengine.id = "demoengine";
		document.body.insertBefore(div_demoengine, document.body.firstChild);
		a_output = document.createElement("a");
		a_output.className = "corner-l active";
		a_output.href = "#";
		//a_output.innerHTML = "Output";
		a_output.onclick = function() {
			removeClass(document.body, "active");
			addClass(a_output, "active");
			removeClass(a_source, "active");
			removeClass(div_source, "active");
			return false;
		};
		div_demoengine.appendChild(a_output);
		a_source = document.createElement("a");
		a_source.className = "corner-r";
		a_source.href = "#";
		//a_source.innerHTML = "Source";
		a_source.onclick = function() {
			addClass(document.body, "active");
			removeClass(a_output, "active");
			addClass(a_source, "active");
			addClass(div_source, "active");
			return false;
		};
		div_demoengine.appendChild(a_source);
		if (top !== self) {
			a_popout = document.createElement("a");
			a_popout.className = "corner-l corner-r";
			a_popout.href = window.location.href;
			a_popout.target = "_blank";
			a_popout.innerHTML = "Open in new window";
			div_demoengine.appendChild(a_popout);
		}
		div_source = document.createElement("div");
		div_demoengine.appendChild(div_source);
		var prettyXHR = 2, prettyFID;
		ajaxRequest(window.location.href, function() {
			div_source.innerHTML = "<PRE class=prettyprint>" + this.responseText.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;") + "</PRE>";
			prettyXHR--;
		});
		loadScript("prettify.js", function() {
			prettyXHR--;
		});
		loadCSS("prettify.css");
		prettyFID = window.setInterval(function() {
			if (prettyXHR === 0) {
				window.clearInterval(prettyFID);
				prettyPrint();
			}
		}, 1000);
	});
})();