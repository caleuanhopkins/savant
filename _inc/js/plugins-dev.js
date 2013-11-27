window.log = function f(){ log.history = log.history || []; log.history.push(arguments); if(this.console) { var args = arguments, newarr; args.callee = args.callee.caller; newarr = [].slice.call(args); if (typeof console.log === 'object') log.apply.call(console.log, console, newarr); else console.log.apply(console, newarr);}};
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

if(!this.jQuery) {
	document.write(unescape('%3Cscript src="/_inc/js/libs/jquery-1.8.3.min.js"%3E%3C/script%3E'));
}

document.write(unescape('%3Cscript src="/_inc/js/libs/jquery-placeholder.min.js"%3E%3C/script%3E'));
document.write(unescape('%3Cscript src="/_inc/js/libs/html5-forms.min.js"%3E%3C/script%3E'));
document.write(unescape('%3Cscript src="/_inc/js/libs/jquery-lazyload.min.js"%3E%3C/script%3E'));
document.write(unescape('%3Cscript src="/_inc/js/libs/jquery.easing.1.3.js"%3E%3C/script%3E'));
document.write(unescape('%3Cscript src="/_inc/js/libs/selectivizr-min.js"%3E%3C/script%3E'));

;(function($){if(typeof $.browser==="undefined"||!$.browser){var browser={};$.extend(browser);}var pluginList={flash:{activex:"ShockwaveFlash.ShockwaveFlash",plugin:/flash/gim},sl:{activex:["AgControl.AgControl"],plugin:/silverlight/gim},pdf:{activex:"PDF.PdfCtrl",plugin:/adobe\s?acrobat/gim},qtime:{activex:"QuickTime.QuickTime",plugin:/quicktime/gim},wmp:{activex:"WMPlayer.OCX",plugin:/(windows\smedia)|(Microsoft)/gim},shk:{activex:"SWCtl.SWCtl",plugin:/shockwave/gim},rp:{activex:"RealPlayer",plugin:/realplayer/gim},java:{activex:navigator.javaEnabled(),plugin:/java/gim}};var isSupported=function(p){if(window.ActiveXObject){try{new ActiveXObject(pluginList[p].activex);$.browser[p]=true;}catch(e){$.browser[p]=false;}}else{$.each(navigator.plugins,function(){if(this.name.match(pluginList[p].plugin)){$.browser[p]=true;return false;}else{$.browser[p]=false;}});}};$.each(pluginList,function(i,n){isSupported(i);});})(jQuery);


;(function($) {
  var cache = [];
  // Arguments are image paths relative to the current page.
  $.preLoadImages = function() {
    var args_len = arguments.length;
    for (var i = args_len; i--;) {
      var cacheImage = document.createElement('img');
      cacheImage.src = arguments[i];
      cache.push(cacheImage);
    }
  }
})(this.jQuery)

//jQuery.preLoadImages("image1.gif", "/path/to/image2.png");


if(this.BrowserDetect.browser == "Explorer" && this.BrowserDetect.version == "6") {
	for(i = 0; i < document.styleSheets.length; i++) {
		document.styleSheets.item(i).disabled = true;
	}
	document.write(unescape('You are using an out of date browser, please update your browser at http://www.browsehappy.com'));
}else{
	var framework = {
		
		init:function() {
			if(navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
				var viewportmeta = document.querySelectorAll('meta[name="viewport"]')[0];
				
				if(viewportmeta) {
					viewportmeta.content = "width=device-width,minimum-scale=1.0,maximum-scale=1.0";
					
					document.body.addEventListener("gesturestart",function() {
						viewportmeta.content = "width=device-width,minimum-scale=0.25,maximum-scale=1.6";
					},false);
				}
			}else{
				/*$("img").lazyload({
					effect:"fadeIn"
				});*/
				
				if($("input").length) {
					$("input").placeholder();
				}
				
				$("a[href$='.zip'],a[href$='.txt'],a[href$='.docx'],a[href$='.doc'],a[href$='.xls'],a[href$='.xlsx'],a[href$='.pdf'],a[href$='.ppt'],a[href$='.pptx']").bind("click",function() {
					window.open(this.href);
					
					return false;
				});
			}
		}
	}
	// Some times add-ons, extension and plugin developers bundle a version of jQuery
	var $ = this.jQuery.noConflict();
	
	$(document).ready(function() {
		framework.init();
	});
}

