bwdefine("bw/InitGoogleMapsApiAndWrapper",["jquery","bw/adaptToPageProtocol"],function(e,t){"use strict";return function(e,a){function i(e,t,a){var i=document.createElement("script");if(t)for(var o in t)i.setAttribute(o,t[o]);i.setAttribute("type","text/javascript"),i.setAttribute("src",e),a&&(i.onload=a),document.body.appendChild(i)}""==e&&(e="AIzaSyDEH1jGMeybufGvDbqTh2W10zAIyZ5XtzU"),"AIzaSyDEH1jGMeybufGvDbqTh2W10zAIyZ5XtzU"==e&&(e=e.replace("eybu","dwat").replace("h2W1","g1VO")),window.googlemapsinitialized=function(){i("js/jquery.ui.map.full.min.js",{charset:"utf-8"},a)},i(t("//maps.googleapis.com/maps/api/js?key="+e+"&callback=googlemapsinitialized"))}});