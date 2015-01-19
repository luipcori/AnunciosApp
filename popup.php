<? include('require/cn.php');

 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	font-weight: bold;
}
-->
</style></head>
<STYLE type=text/css>
#divScroller1 {
	BORDER-RIGHT: #666666 0px solid;
	BORDER-TOP: #666666 0px solid;
	Z-INDEX: 9;
	LEFT: 0px;
	OVERFLOW: hidden;
	BORDER-LEFT: #666666 0px solid;
	WIDTH: 402px;
	CLIP: rect(0px 100px 100px 0px);
	BORDER-BOTTOM: #ff0000 0px solid;
	POSITION: relative;
	TOP: 0px;
	HEIGHT: 480px;
	visbility: visible
}
.dynPage {
	PADDING-LEFT: 0px; FONT-SIZE: 10px; Z-INDEX: 10; LEFT: 0px; VISIBILITY: hidden; WIDTH: 385px; COLOR: black; LINE-HEIGHT: 14px; FONT-FAMILY: arial,helvetica,sans-serif; POSITION: absolute; TOP: 0px
}
</STYLE>
<SCRIPT language=JavaScript type=text/javascript>
function lib_bwcheck(){ //Browsercheck (needed)
	this.ver=navigator.appVersion
	this.agent=navigator.userAgent
	this.dom=document.getElementById?1:0
	this.opera5=(navigator.userAgent.indexOf("Opera")>-1 && document.getElementById)?1:0
	this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom && !this.opera5)?1:0; 
	this.ie6=(this.ver.indexOf("MSIE 6")>-1 && this.dom && !this.opera5)?1:0;
	this.ie4=(document.all && !this.dom && !this.opera5)?1:0;
	this.ie=this.ie4||this.ie5||this.ie6
	this.mac=this.agent.indexOf("Mac")>-1
	this.ns6=(this.dom && parseInt(this.ver) >= 5) ?1:0; 
	this.ns4=(document.layers && !this.dom)?1:0;
	this.bw=(this.ie6 || this.ie5 || this.ie4 || this.ns4 || this.ns6 || this.opera5)
	return this
}
var bw=lib_bwcheck()
var numScrollPages = 5         //Set the number of pages (layers) here. Add and remove the pages 			       //in the body too. The first layer is called dynPage0, the second 			       //is dynPage1, and so on.
var transitionOut = 1;         //The 'out' effect... 0= no effect, 1= fade
var transitionIn = 2;          //The 'in' effect... 0= no effect, 1= fade, 2= slide
var slideAcceleration = 0.2;   //If you use the slide animation, set this somewhere between 0 and 1.
var transitionOnload = 1       //Use the 'in' transition when the page first loads? If you want the transition fx only when the links are clicked, you can set it to 0.

var px = bw.ns4||window.opera?"":"px";
if(document.layers){ //NS4 resize fix...
	scrX= innerWidth; scrY= innerHeight;
	onresize= function(){if(scrX!= innerWidth || scrY!= innerHeight){history.go(0)} }
}
function scrollerobj(obj,nest){
	nest = (!nest)?"":'document.'+nest+'.'
	this.elm = bw.ie4?document.all[obj]:bw.ns4?eval(nest+'document.'+obj):document.getElementById(obj)
	this.css = bw.ns4?this.elm:this.elm.style
	this.doc = bw.ns4?this.elm.document:document
	this.obj = obj+'scrollerobj'; eval(this.obj+'=this')
	this.x = (bw.ns4||bw.opera5)?this.css.left:this.elm.offsetLeft
	this.y = (bw.ns4||bw.opera5)?this.css.top:this.elm.offsetTop
	this.w = (bw.ie4||bw.ie5||bw.ie6||bw.ns6)?this.elm.offsetWidth:bw.ns4?this.elm.clip.width:bw.opera5?this.css.pixelWidth:0
	this.h = (bw.ie4||bw.ie5||bw.ie6||bw.ns6)?this.elm.offsetHeight:bw.ns4?this.elm.clip.height:bw.opera5?this.css.pixelHeight:0
}
scrollerobj.prototype.moveTo = function(x,y){
	if(x!=null){this.x=x; this.css.left=x+px}
	if(y!=null){this.y=y; this.css.top=y+px}
}
scrollerobj.prototype.moveBy = function(x,y){this.moveTo(this.x+x,this.y+y)}
scrollerobj.prototype.hideIt = function(){this.css.visibility='hidden'}
scrollerobj.prototype.showIt = function(){this.css.visibility='visible'}

var scrollTimer = null;
function scroll(step){
	clearTimeout(scrollTimer);
	if ( !busy && (step<0&&activePage.y+activePage.h>scroller1.h || step>0&&activePage.y<0) ){
		activePage.moveBy(0,step);
		scrollTimer = setTimeout('scroll('+step+')',40);
	}
}
function stopScroll(){
	clearTimeout(scrollTimer);
}

var activePage = null;
var busy = 0;
function activate(num){
	if (activePage!=pages[num] && !busy){
		busy = 1;
		if (transitionOut==0 || !bw.opacity){ activePage.hideIt(); activateContinue(num); }
		else if (transitionOut==1) activePage.blend('hidden', 'activateContinue('+num+')');
	}
}

function activateContinue(num){
	busy = 1;
	activePage = pages[num];
	activePage.moveTo(0,0);
	if (transitionIn==0 || !bw.opacity){ activePage.showIt(); busy=0; }
	else if (transitionIn==1) activePage.blend('visible', 'busy=0');
	else if (transitionIn==2) activePage.slide(0, slideAcceleration, 40, 'busy=0');
}

scrollerobj.prototype.slide = function(target, acceleration, time, fn){
	this.slideFn= fn?fn:null;
	this.moveTo(0,scroller1.h);
	if (bw.ie4&&!bw.mac) this.css.filter = 'alpha(opacity=100)';
	if (bw.ns6) this.css.MozOpacity = 1;
	this.showIt();
	this.doSlide(target, acceleration, time);
}
scrollerobj.prototype.doSlide = function(target, acceleration, time){
	this.step = Math.round(this.y*acceleration);
	if (this.step<1) this.step = 1;
	if (this.step>this.y) this.step = this.y;
	this.moveBy(0, -this.step);
	if (this.y>0) this.slideTim = setTimeout(this.obj+'.doSlide('+target+','+acceleration+','+time+')', time);
	else {	
		eval(this.slideFn);
		this.slideFn = null;
	}
}

scrollerobj.prototype.blend= function(vis, fn){
	if (bw.ie5||bw.ie6 && !bw.mac) {
		if (vis=='visible') this.css.filter= 'blendTrans(duration=0.9)';
		else this.css.filter= 'blendTrans(duration=0.6)';
		this.elm.onfilterchange = function(){ eval(fn); };
		this.elm.filters.blendTrans.apply();
		this.css.visibility= vis;
		this.elm.filters.blendTrans.play();
	}

	else if (bw.ns6 || bw.ie&&!bw.mac){
		this.css.visibility= 'visible';
		vis=='visible' ? this.fadeTo(100, 7, 40, fn) : this.fadeTo(0, 9, 40, fn);
	}

	else {
		this.css.visibility= vis;
		eval(fn);
	}
};

scrollerobj.prototype.op= 100;
scrollerobj.prototype.opacityTim= null;
scrollerobj.prototype.setOpacity= function(num){
	this.css.filter= 'alpha(opacity='+num+')';
	this.css.MozOpacity= num/100;
	this.op= num;
}
scrollerobj.prototype.fadeTo= function(target, step, time, fn){
	clearTimeout(this.opacityTim);

this.opacityFn= fn?fn:null;
this.op = target==100 ? 0 : 100;
this.fade(target, step, time);
}

scrollerobj.prototype.fade= function(target, step, time){
	if (Math.abs(target-this.op)>step){
		target>this.op? this.setOpacity(this.op+step):this.setOpacity(this.op-step);
		this.opacityTim= setTimeout(this.obj+'.fade('+target+','+step+','+time+')', time);
	}
	else {
		this.setOpacity(target);
		eval(this.opacityFn);
		this.opacityFn= null;
	}
}

var pageslidefadeLoaded = 0;
function initPageSlideFade(){
	scroller1 = new scrollerobj('divScroller1');
	pages = new Array();
	for (var i=0; i<numScrollPages; i++){
		pages[i] = new scrollerobj('dynPage'+i, 'divScroller1');
		pages[i].moveTo(0,0);
	}

	bw.opacity = ( bw.ie && !bw.ie4 && navigator.userAgent.indexOf('Windows')>-1 ) || bw.ns6
	if (bw.ie5||bw.ie6 && !bw.mac) pages[0].css.filter= 'blendTrans(duration=0.6)'; // Preloads the windows filters.
	if (transitionOnload) activateContinue(0);
	else{
		activePage = pages[0];
		activePage.showIt();
	}

	if (bw.ie) for(var i=0;i<document.links.length;i++) document.links[i].onfocus=document.links[i].blur;
	pageslidefadeLoaded = 1;
}

if(bw.bw && !pageslidefadeLoaded) onload = initPageSlideFade;
</SCRIPT>
<body>
	<? $id =trim($_GET["id"]);
		$query = "select * from anuncios where id = '$id'";
				$rs = mysql_query($query);
				while($fila = mysql_fetch_array($rs)) {
				$imagen= '../AnunciosApp/admin/aplication/views/admin/subir_archivo/test/'.$fila["imagen"];
                $titulo= $fila["titulo"];
                $categoria= $fila["categoria"];
                $detalle= $fila["detalle"];
                //echo $imagen."<br>"
      		//	if ($imagen=="") $imagen ="../AnunciosApp/productos_img/avisos.jpg";
			//	if ($imagen2=="") $imagen2 ="../AnunciosApp/productos_img/avisos.jpg";
				//if ($imagen3=="") $imagen3 ="../AnunciosApp/productos_img/avisos.jpg";
				//if ($imagen4=="") $imagen4 ="../AnunciosApp/productos_img/avisos.jpg";
				?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#006699">&nbsp;	</td>
  </tr>
  
  <tr>
    <td><table width="520" height ="400" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="120" height ="400">
		<table width="100" border="1" align="center" cellpadding="0" cellspacing="5" bordercolor="#CCCCCC">
	
	   <tr>
            <td><a  onFocus=if(this.blur)this.blur()
                    onClick="activate(2); return false;" popup.php?id=7
                    href="popup.php?id=<? echo $id;?>"><img src="<? echo $imagen;?>" border="0" alt="avisos" width="100" height="110" /></a></td>
          </tr>
       </table></td>
        
		<td width="400">

		 <TABLE borderColor=#9d0101 height=450 cellSpacing=0 cellPadding=0 width=410 border=1>
                <TBODY>
                <TR>
                  <TD borderColor=#c0c0cc >
                     <IMG src="<? echo $imagen;?>" width="400" height="400" border="0">
                  </TD>
                </TR>
                </TBODY>
         </TABLE>
		</td>
		</tr>
    </table></td>
  </tr>
  
  
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="520" border="0" cellspacing="0" cellpadding="0">
      
      <tr>
        <td height="15" class="Estilo1"><div align="right">TITULO : </div></td>
        <td><span class="Estilo1">&nbsp;&nbsp;<? echo $titulo;?></span></td>
      </tr>
      <tr>
        <td width="120" height="25" class="Estilo1"><div align="right">DESCRIPCION:</div></td>
        <td width="400" class="Estilo1"><? echo $detalle;?></td>
      </tr>
      
      <?
       if($fila["eliminado"]==0){
	  ?>
      <tr>
        <td height="40" class="Estilo1"><div align="right">FECHA REGISTRO : </div></td>
        <td><div align="left" class="Estilo1">&nbsp;&nbsp;<? echo $fila["fecha_pub"];?></div>
          <div align="left"></div></td>
      </tr>
      
      <? }?>
      
    </table></td>
  </tr>
</table>
<? }?>
</body>
</html>
