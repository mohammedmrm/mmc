bwdefine("BeforeAfter",["config","bw/widget","jquery","bw/uriEncodeImage"],function(e,t,i,n){"use strict";i(function(){function a(){var e=i("#draghandle"),t=e.parent();w=t.width(),c=t.height(),e.draggable({containment:[-20-f,-20-v,w-20-f,c-20-v]})}function r(e){i("#imagemask").css("height",e+20+v)}function l(e){i("#imagemask").css("width",e+20+f)}function s(e){i("#imagemask").css("opacity",e)}function o(){var e=c*m-20-v;r(e),i("#draghandle").css("top",e)}function h(){var e=w*m-20-f;l(e),i("#draghandle").css("left",e)}function d(){var e=w*m-20-f;s(m),i("#draghandle").css("left",e)}function g(e,t,i,n){var a,r,l=e,s=e/2.5,o=e,h=e,d=[[-l,-s],[-l,-h],[-l-o,0],[-l,h],[-l,s],[l,s],[l,h],[l+o,0],[l,-h],[l,-s]],g="";n?(a=1,r=0):(a=0,r=1);for(var u=0;u<d.length;++u){var p=d[u];g+=p[a]+t+","+(i+p[r])+" "}return g}function u(){i("#image2").css("width",i("#image1").width()),i("#image2").css("height",i("#image1").height()),a(),"vertical"==e.handle_orientation?o():"horizontal"==e.handle_orientation?h():d()}t.makeWidget({layout:"title_overlay_layout",title:e.title,"no-user-select":!0});var p="cover";"Contain entire picture, keep aspect ratio"==e["resize-policy"]?p="contain":"Cover entire area with entire picture"==e["resize-policy"]&&(p="100% 100%"),i("#image1").css({background:"black url("+n(e.before)+") no-repeat center center","background-size":p}),i("#image2").css({background:"black url("+n(e.after)+") no-repeat center center","background-size":p});var c=0,w=0,f=1e3,v=1e3,m=e.start_position&&""!=e.start_position?parseFloat(e.start_position)/100:.5;if("vertical"==e.handle_orientation){var b=[];if(b.push('<line x1="0" y1="'+(20+v)+'" x2="3072" y2="'+(20+v)+'"/>'),""==e.handle_type||"default"==e.handle_type){var y=g(15,55,20+v,!0);b.push('<polygon points="'+y+'"/>')}else"none"==e.handle_type&&b.push('<rect class="transparent" x="0" y="0" width="3072" height="2048"/>');var x=i('<svg id="draghandle" class="horizontal" xmlns="http://www.w3.org/2000/svg" version="1.1">'+b.join("")+"</svg>").appendTo(i("#bottom-container"));if("image"==e.handle_type&&""!=e.handle_image){var _=new Image;_.onload=function(){var t=this.width,i=this.height,a=document.createElementNS("http://www.w3.org/2000/svg","image");a.setAttributeNS(null,"height",i),a.setAttributeNS(null,"width",t),a.setAttributeNS("http://www.w3.org/1999/xlink","href",n(e.handle_image)),a.setAttributeNS(null,"x",55-t/2),a.setAttributeNS(null,"y",1020-i/2),a.setAttributeNS(null,"visibility","visible"),x.append(a)},_.src=e.handle_image}x.draggable({axis:"y",drag:function(e,t){r(t.offset.top),c&&(m=(t.offset.top+20+v)/c)}}),x.css({left:"0px",top:"500px",height:"2048px",width:"3072px"}),u()}else if("horizontal"==e.handle_orientation){var b=[];if(b.push('<line x1="'+(20+f)+'" y1="0" x2="'+(20+f)+'" y2="2048"/>'),""==e.handle_type||"default"==e.handle_type){var y=g(15,f+20,1975,!1);b.push('<polygon points="'+y+'"/>')}else"none"==e.handle_type&&b.push('<rect class="transparent" x="0" y="0" width="3072" height="2048"/>');var x=i('<svg id="draghandle" class="vertical" xmlns="http://www.w3.org/2000/svg" version="1.1">'+b.join("")+"</svg>").appendTo(i("#bottom-container"));if("image"==e.handle_type&&""!=e.handle_image){var _=new Image;_.onload=function(){var t=this.width,i=this.height,a=document.createElementNS("http://www.w3.org/2000/svg","image");a.setAttributeNS(null,"height",i),a.setAttributeNS(null,"width",t),a.setAttributeNS("http://www.w3.org/1999/xlink","href",n(e.handle_image)),a.setAttributeNS(null,"x",1020-t/2),a.setAttributeNS(null,"y",975-i/2),a.setAttributeNS(null,"visibility","visible"),x.append(a)},_.src=e.handle_image}x.draggable({axis:"x",drag:function(e,t){l(t.offset.left),w&&(m=(t.offset.left+20+f)/w)}}),x.css({bottom:"0px",left:"500px",height:"2048px",width:"3072px"}),u()}else{var b=[];if(""==e.handle_type||"default"==e.handle_type){var y=g(15,f+20,975,!1);b.push('<polygon points="'+y+'"/>')}else"none"==e.handle_type&&b.push('<rect class="transparent" x="0" y="0" width="3072" height="2048"/>');var x=i('<svg id="draghandle" class="vertical" xmlns="http://www.w3.org/2000/svg" version="1.1">'+b.join("")+"</svg>").appendTo(i("#bottom-container"));if("image"==e.handle_type&&""!=e.handle_image){var _=new Image;_.onload=function(){var t=this.width,i=this.height,a=document.createElementNS("http://www.w3.org/2000/svg","image");a.setAttributeNS(null,"height",i),a.setAttributeNS(null,"width",t),a.setAttributeNS("http://www.w3.org/1999/xlink","href",n(e.handle_image)),a.setAttributeNS(null,"x",1020-t/2),a.setAttributeNS(null,"y",975-i/2),a.setAttributeNS(null,"visibility","visible"),x.append(a)},_.src=e.handle_image}x.draggable({axis:"x",drag:function(e,t){w&&(m=(t.offset.left+20+f)/w),s(m)}}),x.css({bottom:"0px",left:"500px",height:"1024px",width:"3072px"}),u()}return"undefined"!=typeof addAllDesignInfo&&addAllDesignInfo(),window.onresize=u,null})}),bwdefine.finalize();