<?php

?>
<!--Creator By Oskhar-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Game Snake
	</title>
</head>
<style type="text/css">
	body{
		height: 100%;
		width: 100%;
		background: white;
		position: absolute;
		overflow: hidden;
	}
	#latar{
		height: <?php echo 15*30 ?>px;
		width: <?php echo 18*30 ?>px;
		background: black;
		position: relative;
		margin: auto;
		border: 50px solid black;
		border-top: 100px solid black;
		border-radius: 10px;
	}
	<?php $angka = 0; ?>
	<?php for ($i=0; $i < 15; $i++): ?>
		<?php for ($x=0; $x < 18; $x++): ?>
			#box<?php echo($angka) ?>{
				height: 28px;
				width: 28px;
				border: 1px solid rgb(150, 150, 150);
				display: inline-block;
				position: absolute;
				top: <?php echo $i*30; ?>px;
				left: <?php echo $x*30; ?>px;
			}
			<?php $angka++; ?>
		<?php endfor; ?>
	<?php endfor; ?>
	#ular{
		height: 28px;
		width: 28px;
		position: absolute;
		left: 270px;
		top: 210px;
		background: #c12f2f;
		border: 1px solid black;
	}
	#makanan{
		height: 30px;
		width: 30px;
		border-radius: 5px;
		background: transparent;
		position: absolute;
		left: 270px;
		top: 210px;
	}
	#makanan::after{
		content: '';
		height: 20px;
		width: 20px;
		border-radius: 5px;
		background: lightgreen;
		position: absolute;
		left: 5px;
		top: 5px;
		transform: rotate(45deg);
	}
	#kumpulanTombol{
		position: relative;
		margin: auto;
		text-align: center;
		align-items: center;
		height: 600px;
		width: 600px;
		background: transparent;
	}
	button{
		height: 200px;
		width: 200px;
		position: absolute;
		border-radius: 20px;
	}
	#tombol1{
		left: 0px;
		top: 200px;
	}
	#tombol2{
		top: 0px;
		left: 200px;
	}
	#tombol3{
		bottom: 0px;
		left: 200px;
	}
	#tombol4{
		right: 0px;
		top: 200px;
	}
	#text{
		color: deepskyblue;
		position: absolute;
		left: 0;
		right: 0;
		margin: auto;
		text-align: left;
		right: 400px;
		top: 0px;
		width: 200px;
	}
	#text1,#text2{
		position: absolute;
		font-family: sans-serif;
	}
	#text1{
		top: 0px;
	}
	#text2{
		top: 25px;
	}
	
</style>
<body>
	<div id="latar">
		<?php for ($i=0; $i < (18*15); $i++): ?>
			<div id="box<?php echo($i) ?>"></div>
		<?php endfor; ?>
		<div id="badan">
			<div id="ular"></div>
		</div>
		<div id="makanan"></div>
	</div>
	<div id="kumpulanTombol">
	    <button onmouseover="directionButton(37)" id="tombol1"><p>></p></button>
	    <button onmouseover="directionButton(38)" id="tombol2"><p>></p></button>
	    <button onmouseover="directionButton(40)" id="tombol3"><p>></p></button>
	    <button onmouseover="directionButton(39)" id="tombol4"><p>></p></button>
	</div>
	<div id="text">
        <h2 id="text1">NAMA</h2>
		<h2 id="text2">Scroe: <font id="isiText2" style="color:lightgreen;">0</font></h2>
	</div>
	<h1 id="data" style="color: black;position: absolute;left: 0;right: 0;margin: auto;top: 30%;font-family: sans-serif;color: deepskyblue;text-align: center;width: 0px;overflow: hidden;font-size: 130px;"></h1>
<script type="text/javascript">
var nama = "";
window.addEventListener("load", function () {
	nama = prompt("Masukan NAMA anda:");
	if (nama == "") {
		nama = "anonim";
	}
	document.getElementById("data").style.width = "500px";
	document.getElementById("data").innerHTML = "3";
	document.getElementById("text1").innerHTML = nama;
    setTimeout(function(){
    	document.getElementById("data").innerHTML = "2";
    },1000);
    setTimeout(function(){
    	document.getElementById("data").innerHTML = "1";
    },1500);
    setTimeout(function(){
    	document.getElementById("data").innerHTML = "start";
    },2000);
    setTimeout(function(){
    	document.getElementById("data").style.width = "0px";
    },2500);
});

var ular = [document.getElementById("ular")];
var lokasiX = 9*30;
var lokasiY = 7*30;
var no = 1;
var score = 0;
var langkahX = [];
var langkahY = [];
let d = "UP";
var makananX = (Math.floor(Math.random()*18) * 30);
var makananY = (Math.floor(Math.random()*15) * 30);
var waktu = 0;
document.getElementById("makanan").style.top =  makananY+"px";
document.getElementById("makanan").style.left =  makananX+"px";
function tambah() {
	document.querySelector('#badan').insertAdjacentHTML(
    'afterbegin',
    '<div id="ular'+no+'" style="height: 28px;width: 28px;border: 1px solid black;position: absolute;background: deepskyblue;top:'+lokasiY+'px;"></div>'
	)
	ular.push(document.getElementById("ular"+no));
	no = no+1;
}

function play() {
	// global lokasiX;
	langkahX.push(lokasiX)
	langkahY.push(lokasiY)
    if( d == "LEFT") lokasiX = lokasiX - 30;
    if( d == "UP") lokasiY = lokasiY - 30;
    if( d == "RIGHT") lokasiX = lokasiX + 30;
    if( d == "DOWN") lokasiY = lokasiY + 30;

	if (lokasiX > 17*30) {
		lokasiX = 0;
	}else if (lokasiX < 0) {
		lokasiX = 17*30;
	}
	if (lokasiY > 14*30) {
		lokasiY = 0;
	}else if (lokasiY < 0) {
		lokasiY = 14*30;
	}

    if (lokasiY == makananY && lokasiX == makananX) {
		makananX = (Math.floor(Math.random()*18) * 30);
		makananY = (Math.floor(Math.random()*15) * 30);
		document.getElementById("makanan").style.top =  makananY+"px";
		document.getElementById("makanan").style.left =  makananX+"px";
		score++;
		document.getElementById("isiText2").innerHTML = score;
		tambah();
    }
	for (var i = 1; i < ular.length; i++) {
		if (lokasiX == (langkahX[langkahX.length-(ular.length-i)]) && lokasiY == (langkahY[langkahY.length-(ular.length-i)])){
			document.getElementById("data").innerHTML = "Game Over";
			document.getElementById("data").style.width = "500px";
		    var xhr2 = new XMLHttpRequest();
		    var param = "nama="+ nama + "&skor=" + score + "&waktu=" + waktu;

			clearInterval(game);
		}
	}    

	ular[0].style.left = lokasiX+"px";
	for (var i = 1; i < ular.length; i++) {
		ular[i].style.left = langkahX[langkahX.length-(ular.length-i)]+"px";
	}
	ular[0].style.top = lokasiY+"px";
	for (var i = 1; i < ular.length; i++) {
		ular[i].style.top = langkahY[langkahY.length-(ular.length-i)]+"px";
	}
	pin = 0;
	waktu = waktu + 1;
}
let game = setInterval(play,50);
var pin = 0;
document.addEventListener('keydown', function(event) {
    let key = event.keyCode;
    if( key == 37 && d != "RIGHT" && pin == 0){
        d = "LEFT";
        pin = 1;
		lu 
    }else if(key == 38 && d != "DOWN" && pin == 0){
        d = "UP";
        pin = 1;

    }else if(key == 39 && d != "LEFT" && pin == 0){
        d = "RIGHT";
        pin = 1;

    }else if(key == 40 && d != "UP" && pin == 0){
        d = "DOWN";
        pin = 1;

    }
});
function directionButton(key){
    if( key == 37 && d != "RIGHT" && pin == 0){
        d = "LEFT";
        pin = 1;
    }else if(key == 38 && d != "DOWN" && pin == 0){
        d = "UP";
        pin = 1;
    }else if(key == 39 && d != "LEFT" && pin == 0){
        d = "RIGHT";
        pin = 1;
    }else if(key == 40 && d != "UP" && pin == 0){
        d = "DOWN";
        pin = 1;
    }
}
</script>
</body>
</html>