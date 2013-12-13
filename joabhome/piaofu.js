document.ns = navigator.appName == "Netscape"
//--
var rnumx1=new Array();
var rnumx2;
var rnumx3;
rnumxtemp="";
for(i=0;i<3;i++){
rnumx2 =Math.round(Math.random()*10);
rnumx2!=10 ? rnumx3=rnumx2:rnumx3=9;
//document.write("["+rnumx3+"]");
rnumx1[i]=rnumx3;
if (rnumx1[0]>4||rnumx1[0]<1){
rnumx1[0]=1;
}
if (rnumx1[1]>2&&rnumx1[0]==4){
	rnumx1[1]=1;
	}
rnumxtemp+=new String(rnumx1[i]);
}
//--
window.screen.width>800 ? imgheight=500:imgheight=rnumxtemp
window.screen.width>800 ? imgright=10:imgright=0
window.screen.width>800 ? imgleft=0:imgleft=0
function threenineload()
{
if (navigator.appName == "Netscape")
{
if(document.getElementById) {
	document.getElementById('threenine').pageY=pageYOffset+window.innerHeight-imgheight;
	document.getElementById('threenine').pageX=imgright;
	document.getElementById('threenine1').pageY=pageYOffset+window.innerHeight-imgheight;
	document.getElementById('threenine1').pageX=imgleft;

} else {
	document.threenine.pageY=pageYOffset+window.innerHeight-imgheight;
	document.threenine.pageX=imgright;
	document.threenine1.pageY=pageYOffset+window.innerHeight-imgheight;
	document.threenine1.pageX=imgleft;
}
threeninemove();
}
else
{
threenine.style.top=document.body.scrollTop+document.body.offsetHeight-imgheight;
threenine.style.right=imgright;
threenine1.style.top=document.body.scrollTop+document.body.offsetHeight-imgheight;
threenine1.style.left=imgleft;
threeninemove();
}
}
function threeninemove()
{
if(document.ns)
{
if(document.getElementById) {
	document.getElementById('threenine').style.top=pageYOffset+window.innerHeight-imgheight
	document.getElementById('threenine').style.right=imgright;
	document.getElementById('threenine1').style.top=pageYOffset+window.innerHeight-imgheight
	document.getElementById('threenine1').style.left=imgleft;
} else {
	document.threenine.top=pageYOffset+window.innerHeight-imgheight
	document.threenine.right=imgright;
	document.threenine1.top=pageYOffset+window.innerHeight-imgheight
	document.threenine1.left=imgleft;
}
setTimeout("threeninemove();",40)
}
else
{
threenine.style.top=document.body.scrollTop+document.body.offsetHeight-imgheight;
threenine.style.right=imgright;
threenine1.style.top=document.body.scrollTop+document.body.offsetHeight-imgheight;
threenine1.style.left=imgleft;
setTimeout("threeninemove();",80)
}
}
function MM_reloadPage(init) { //reloads the window if Nav4 resized
if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true)

{
document.write("<div id=threenine style='position: absolute;width:76;top:158;visibility: visible;z-index: 1'><table width=104 border=0 cellspacing=0 cellpadding=0>");
  document.write("<tr><td><img src=img/qq1.gif width=109 height=55 border=0></td></tr>");
  document.write("<tr><td height=123 background=img/qq2.gif><table border=0 align=center cellpadding=0 cellspacing=0>");
   document.write("<tr><td width=92 colspan=2><div align=left class=12><srtong>Questions?</strong>Click here to chat with us now.</div></td></tr>");
    document.write("<tr><td width=22><div align=center><img src=img/msn.gif width=17 height=19></div></td><td width=70 height=22><a href=msnim:chat?contact=sales8joabhomearts@hotmail.com  class=13>Angela</a></td></tr>");
    document.write("<tr><td width=22><div align=center><img src=img/msn.gif width=17 height=19></div></td><td width=70 height=22><a href=msnim:chat?contact=joabhomearts@hotmail.com class=13>rika</a></td></tr>");
    document.write("<tr><td width=22><div align=center><img src=img/msn.gif width=17 height=19></div></td><td width=70 height=22><a href=msnim:chat?contact=joabhome@hotmail.com  class=13>joab</a></td></tr>");
    
   
        document.write("</table></td></tr>");
  document.write("<tr><td height=36 valign=top><img src=img/qq3.gif width=109 height=69></td></tr></table></div>");


document.write("<div id=threenine1 style='position: absolute;width:76;top:158;visibility: visible;z-index: 1'><table width=218 border=0 cellspacing=0 cellpadding=0>");
  document.write("<tr><td background=img/qq1.gif height=55></td></tr>");
  document.write("<tr><td height=60 background=img/qq2.gif><table border=0 align=center cellpadding=0 cellspacing=0>");
   document.write("<tr><td width=110 colspan=2><div align=left class=12><a href=productlist_new.php class=13>Click here to <br>New Arrivals <br> Best Sellers.</a></div></td><td width=90 colspan=2><div align=center class=12><a href=stock.html class=13><img src=pifu_pic.jpg border=0></a></div></td></tr>");
    
   
        document.write("</table></td></tr>");
  document.write("<tr><td height=69 background=img/qq3.gif valign=top></td></tr></table></div>");
  
  
threenineload()
}
