function getUrlParameter(sParam) {
    var sPageURL = decodeURI(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
             if(sParameterName[1] === undefined){
              return "";
             }
             else
             {
              return sParameterName[1];
             }

        }
    }
}