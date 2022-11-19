bwdefine("chart",["config","widgetstorage","bw/widget","jquery","bw/dialog","bw/tr","bw/tool","./jit","bw/ProgressLogger","bwtable"],function(e,a,t,l,o,n,r,s,i,c){"use strict";function u(e){var a=[],t=[""].concat(e.label);a.push(t);for(var l=0;l<e.values.length;++l){var o=e.values[l],t=[o.label].concat(o.values);a.push(t)}return a}function h(a){var t={};t.label=[];for(var l=a[0],o=1;o<l.length;++o)t.label.push(l[o]);t.values=[];for(var o=1;o<a.length;++o){var n=a[o],r={};r.label=n[0],r.values=[];for(var s=1;s<n.length;++s){var i=n[s]&&""!=n[s]?parseFloat(n[s]):0;isNaN(i)&&(i=0),r.values.push(i)}t.values.push(r)}for(var c=[],o=0;o<e.barcolors.length;++o)c.push(e.barcolors[o].color);return c.length>0&&(console.log("Setting colors"),console.log(c),t.color=c),t}function d(a){var t={};t.label=a.label,t.values=[];for(var l=0;l<a.values.length;++l){var o=a.values[l],n={};n.label=o.label,n.values=[];for(var r=0;r<o.values.length;++r)n.values.push(o.values[r]&&""!=o.values[r]?parseFloat(o.values[r]):0);t.values.push(n)}for(var s=[],l=0;l<e.barcolors.length;++l)s.push(e.barcolors[l].color);return s.length>0&&(console.log("Setting colors"),console.log(s),t.color=s),t}function v(e,a){var t=Math.pow(10,a||0);return String(Math.round(e*t)/t)}function f(){l.browser.msie&&10==l.browser.version&&l("#dataTable").css("width",50*(e.chartdata.label.length+1));var a=l("#bottom-container"),t=l("#tablediv"),o=l("#legend"),n=10;t.css("left",a.width()-n-t.outerWidth()),o.css("left",a.width()-n-o.outerWidth());var r=t.outerHeight(),s=o.outerHeight(),i=a.height()-3*n;if(r>i/2)if(s>i/2)r=i/2,t.css({height:r}),s=i/2,o.css({height:s});else{var c=i-s;if(c<r)r=c,t.css({height:r});else;}else if(s>i/2){var c=i-r;if(c<s)s=c,o.css({height:s});else;}else;t.css("top",n),o.css("top",2*n+r),"yes"===e.hide_legend&&l("#legend").hide()}function g(e){if(e>0){for(var a=1;e>100;)e/=10,a*=10;for(;e<10;)e*=10,a/=10;return e>50?a*=5:e>20&&(a*=2),a}return 0}function b(a){function o(){var e=l('<div class="axis-placeholder"></div>').appendTo(l("body"));m=e.css("stroke"),e.remove();var a=l('<div class="axis-label-placeholder"></div>').appendTo(l("body"));y=a.css("font-family"),w=parseInt(a.css("font-size")),T=a.css("color"),a.remove();var t=l('<div class="axis-scale-placeholder"></div>').appendTo(l("body"));x=t.css("font-family"),_=parseInt(t.css("font-size")),k=t.css("color"),t.remove();var o=l('<div class="axis-bar-placeholder"></div>').appendTo(l("body"));H=o.css("font-family"),z=parseInt(o.css("font-size")),A=o.css("color"),o.remove()}function n(){l("#infovis").html(""),e.max_y_value&&s.BarChart.implement({getMaxValue:function(){return parseFloat(e.max_y_value)}}),p=new s.BarChart({injectInto:"infovis",animate:!0,orientation:"vertical",barsOffset:20,Margin:{top:5,left:45,right:5,bottom:5},labelOffset:10,type:u?"stacked2:gradient":"stacked2",showAggregates:!0,showLabels:!0,Label:{type:c,size:z,family:H,color:A},Tips:{enable:!0,onShow:function(e,a){e.innerHTML="<b>"+a.name+"</b>: "+a.value}}}),a?p.loadJSON(h(a)):p.loadJSON(d(e.chartdata))}function i(){if(B=!1,J){var e=J;J=null,j?(j=!1,N(e)):C(e)}}var c,u,v,g,b=navigator.userAgent,M=b.match(/iPhone/i)||b.match(/iPad/i),O=typeof HTMLCanvasElement,P="object"==O||"function"==O,L=P&&"function"==typeof document.createElement("canvas").getContext("2d").fillText;c=!P||L&&!M?"Native":"HTML",v="Native"==c,u=P,g=!(M||!P);var H,z,A;o(),n(),window.onresize=function(){t.centerTitle(!0),n(),f()},S=function(){var e=p.getLegend(),a=[];for(var t in e)a.push("<div class='query-color' style='background-color:"+e[t]+"'>&nbsp;</div>"+t);var l=s.id("legend");l.innerHTML="<ul><li>"+a.join("</li><li>")+"</li></ul>"};var B=!1,J=null,j=!1;C=function(e){B?(J=e,j|=!1):(B=!0,p.updateJSON(e,{onComplete:i}))},N=function(e){B?(J=e,j=!0):(B=!0,p.loadJSON(e),setTimeout(i,1e3))},S(),r.addCSSUpdateCallback(function(){o(),p.st.fx.plot()})}var p,m,y,w,T,x,_,k,C=null,S=null,N=null,M=null;s.ST.Plot.NodeTypes.implement({"barchart-stacked2":{render:function(a,t){if(this.nodeTypes["barchart-stacked"].render.call(this,a,t),"yes"==e.show_axis){var o=l(t.element),n=o.width(),r=o.height(),s=r-60,i=n-80,c=t.getCtx();c.save(),c.translate(-i/2,s/2),c.strokeStyle=m,c.lineWidth=1,c.beginPath(),c.moveTo(0,0),c.lineTo(0,-s),c.moveTo(0,0),c.lineTo(i+40,0),c.closePath(),c.stroke(),c.fillStyle=k,c.font=_+"px "+x,c.textAlign="right",c.textBaseline="middle";var u=-s,h=p.getMaxValue();0==h&&(h=1);for(var d=g(h),f=d;f<=h;){var b=u*(f/h);c.beginPath(),c.moveTo(0,b),c.lineTo(-4,b),c.closePath(),c.stroke(),c.fillText(v(f,2),-6,b),f+=d}c.fillStyle=T,c.textBaseline="Bottom",c.font=w+"px "+y,c.fillText(e.x_axis_label,i+40,-12),c.save(),c.rotate(-Math.PI/2),c.fillText(e.y_axis_label,s,12),c.restore(),c.restore()}},contains:function(e,a){return this.nodeTypes["barchart-stacked"].contains.call(this,e,a)}}}),s.BarChart.implement({getMaxValue:function(){var e=0,a="stacked2"==this.config.type.split(":")[0];return this.st.graph.eachNode(function(t){var o=t.getData("valueArray"),n=0;o&&(a?l.each(o,function(e){n+=+o[e]}):n=Math.max.apply(null,o),e=e>n?e:n)}),e}}),l(function(){function r(e){for(var a=0,t=0,l=1;l<e.length;++l)for(var o=1;o<e[l].length;++o)++a,""!==e[l][o]&&++t;v.setProgress(t,a)}function s(){g=u(e.chartdata),l("#dataTable").bwtable("loaddata",g),C&&C(h(g)),S&&S()}function c(e){for(var a=JSON.parse(e),t=0;t<a.length;++t)if(t<g.length)for(var l=a[t],o=g[t],n=0;n<l.length;++n)n<o.length&&(o[n]=l[n])}function d(a){g=u(e.chartdata),"yes"===e.save_answers&&null!==a&&""!==a&&c(a),l("#dataTable").bwtable("loaddata",g),m?(N(h(g)),S()):(m=!0,b(g)),setTimeout(f,100)}t.makeWidget({layout:"title_toolbar_layout",title:e.title});var v=i(),g=u(e.chartdata);l("#dataTable").bwtable({data:g,stretchH:"none",asyncRendering:!1,onChange:function(e,a){console.log("onChange");var t=!1,l=!1;if(e)for(var o=0;o<e.length;++o)0==e[o][0]&&(l=!0),0==e[o][1]&&(t=!0);null!==C&&(t?(console.log("recreateChart"),N(h(g))):(console.log("updateChart"),C(h(g))),l&&(console.log("updateLegend"),S()),null!==M&&(console.log("save"),M())),r(g)},cells:function(a,t,l){var o={};return"yes"!=e.allow_row_header_changes&&0===t&&(o.readOnly=!0),"yes"!=e.allow_column_header_changes&&0===a&&(o.readOnly=!0),o}}),l("#legend").draggable();var p=!0;l("#spreadsheet_button").click(function(){p?(l("#tablediv").hide(),p=!1):(l("#tablediv").show(),p=!0)}),l("#clear_button").click(function(){o.showConfirmationDialog(n("All chart data will be permanently deleted and cannot be recovered. Are you sure?"),n("Clear the chart data and start over?"),s,null,n("Yes, clear"),n("No, keep"))});var m=!1,m=!1;M=function(){"yes"===e.save_answers&&a.write(JSON.stringify(g))},a.init({type:"Chart",group:"_no_name_",name:e.title,id:e.uuid2,updateCallback:d,singleKey:!0,extension:".Spreadsheet"})})}),bwdefine.finalize();