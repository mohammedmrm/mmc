function parse(e){e||(e={});var r,n=e.html,a=[];n.indexOf("<pre"),n.indexOf("<code"),n.indexOf("<script");a.push(/([< \/][^>]*?>)((\s*[^<\s]+\s+?)+)([^<\s]+\s*)(<)/g),r=/(>)([^<\n]*?[^<]+?)(<[^\/])/g;for(var s=0;s<a.length;s++){var t=a[s];n=n.replace(t,function(e,r){if(arguments[1].indexOf('class="parsed"')>=0)return e;if(0==arguments[1].indexOf("<pre"))return e;if(0==arguments[1].indexOf("<code"))return e;if(0==arguments[1].indexOf("<script"))return e;var n="",a=arguments[2].split(" ");""==a[a.length-1]&&a.splice(-1,1),a.push(arguments[4]);for(var s=0;s<a.length;s++){var t=s==a.length-1?"":" ";n+="<span>"+a[s]+t+"</span>"}return arguments[1]+n+"<"})}r&&(n=n.replace(r,function(e,r){if(!arguments[2].trim())return e;var n="<span>"+arguments[2]+"</span>";return arguments[1]+n+arguments[3]})),n=n.replace(/(<a [\s\S]*?)(>)/g,'$1 onclick="return false;" $2'),self.postMessage({data:n,id:id})}function clone(e){if(null==e||"object"!=typeof e)return e;var r=e.constructor();for(var n in e)e.hasOwnProperty(n)&&(r[n]=clone(e[n]));return r}var id,self=this;self.addEventListener("message",function(e){var r=e.data.func,n=e.data.params;id=e.data.id,self[r].apply(self,n)},!1);var log=console.log;