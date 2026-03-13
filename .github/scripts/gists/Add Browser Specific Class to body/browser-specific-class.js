//IE-10
if (jQuery.browser.msie && jQuery.browser.version == 10) {
	jQuery("html").addClass("ie10");
}

// IE 11
if(navigator.userAgent.match(/Trident.*rv:11\./)) {
	jQuery('body').addClass('ie11');
}

// detect IE8 and above, and edge
if (document.documentMode || /Edge/.test(navigator.userAgent)) {
	jQuery('body').addClass('ie-edge');
}

//For Safari Browser
var isSafari = /constructor/i.test(window.HTMLElement);
if(isSafari){
	jQuery('body').addClass('safari');
}

//For Safari Browser (Updated)
if(navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
	jQuery('body').addClass('safari');
}

//Detect safari browser for windows only
var ua = navigator.userAgent.toLowerCase();
if(ua.indexOf("safari/") !== -1 &&  // It says it's Safari
	ua.indexOf("windows") !== -1 &&  // It says it's on Windows
	ua.indexOf("chrom")   === -1     // It DOESN'T say it's Chrome/Chromium
){
	// Looks like Safari on Windows (but browser detection is unreliable and best avoided)
	//alert("windows safari");
	jQuery('body').addClass('windows-safari');
}

// Add additional class for touch devices
if ("ontouchstart" in window || "ontouch" in window) { 
    $('body').addClass('touch'); 
}