// JavaScript Document
function controla(){
	var pdrs="";
	var x=document.getElementById('imagen').files.length;
	var i;
	if(x<=3){
		for(i=0;i<x;i++){
			pdrs +=document.getElementById('imagen').files[i].name+" ";			
		}
		document.getElementById('info').innerHTML = pdrs;
	}else{
		alert("Solo puede cargar 3 imagenes");
		document.getElementById('info').innerHTML="";
		var clone =document.getElementById('imagen');
  		clone.value = '';
		return false;
	}
}
function con(){
	var ar=document.getElementById('arc');
	pdrs2 =ar.files[0].name;			
	alert(pdrs2);
	document.getElementById('info2').innerHTML = pdrs2;
}