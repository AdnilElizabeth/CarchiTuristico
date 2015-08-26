<style type="text/css">
/* BANNER CAMBIANTE
----------------------------------------------- */
#rotator {
border: 1px solid #000000;
overflow: hidden;
margin: 0px ;
padding:2px;
position: relative;
width: 1030px;
height: 400px;
}
#rotator img {
width: 1030px;
height: 400px;
border: 0;
margin: 0;
padding: 0;
}
</style>

<script> 
//<![CDATA[
/*****
Image Cross Fade Redux
Version 1.0
Last revision: 02.15.2006
steve@slayeroffice.com
Please leave this notice intact. 
*****/

window.addEventListener?window.addEventListener('load',so_init,false):window.attachEvent('onload',so_init);
var d=document, imgs = new Array(), zInterval = null, current=0, pause=false;
function so_init() {
if(!d.getElementById || !d.createElement)return;
css = d.createElement('link');
css.setAttribute('href','slideshow2.css');
css.setAttribute('rel','stylesheet');
css.setAttribute('type','text/css');
d.getElementsByTagName('head')[0].appendChild(css);
imgs = d.getElementById('rotator').getElementsByTagName('img');
for(i=1;i<imgs.length;i++) imgs[i].xOpacity = 0;
imgs[0].style.display = 'block';
imgs[0].xOpacity = .99;
setTimeout(so_xfade,3000); }
function so_xfade() {
cOpacity = imgs[current].xOpacity;
nIndex = imgs[current+1]?current+1:0;
nOpacity = imgs[nIndex].xOpacity;
cOpacity-=.05;
nOpacity+=.05;
imgs[nIndex].style.display = 'block';
imgs[current].xOpacity = cOpacity;
imgs[nIndex].xOpacity = nOpacity;
setOpacity(imgs[current]);
setOpacity(imgs[nIndex]);
if(cOpacity<=0) {
imgs[current].style.display = 'none';
current = nIndex;
setTimeout(so_xfade,3000);}
else {
setTimeout(so_xfade,50);
}
function setOpacity(obj) {
if(obj.xOpacity>.99) {
obj.xOpacity = .99;
return; }
obj.style.opacity = obj.xOpacity;
obj.style.MozOpacity = obj.xOpacity;
obj.style.filter = 'alpha(opacity=' + (obj.xOpacity*100) + ')';
}
}
//]]>
</script>
<div id="rotator">
<a href=""><img src="../data/img/1(1).jpg" /></a>
<a href=""><img src="../data/img/1(9).jpg" /></a>
<a href=""><img src="../data/img/1(3).jpg" /></a>
<a href=""><img src="../data/img/1(4).jpg" /></a>
<a href=""><img src="../data/img/1(5).jpg" /></a>
<a href=""><img src="../data/img/1(6).jpg" /></a>
<a href=""><img src="../data/img/1(7).jpg" /></a>
<a href=""><img src="../data/img/1(8).jpg" /></a>
</div>