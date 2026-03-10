<!DOCTYPE html>
<html>
<head>
<title>Pretraga</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="prodavnicainstrumenata.js"></script>
<link rel="stylesheet" href="prodavnicainstrumenata.css">
</head>

<body onload = "startTimer(),startTimer1(),startTimer2()">
<div  class="content" > 

<a href="http://localhost/prodavnicainstrumenata/index.php"><img src="logo.jpg"  class="logo" ><a/>

<table class="glavnimeni" >
<tr>
<td class="glavnimeni">
<a href="javascript:void(0);" id="link" onclick="priktab(this.id);">NAŠI PROIZVODI</a>
</td>
<td class="glavnimeni">
<a href="http://localhost/prodavnicainstrumenata/radsabazom.php">UPRAVLJANJE BAZOM</a>
</td>
</tr>
</table>
 
<div class="levastrana">
<a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=Gitare"><img src="gibson_jimmy_page.jpg"  id="slike" class="gitare1"></a>
<a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=Gitare"><img src="spojnica2c.jpg" class="gitare2" ></a>
</div>

<div class="desnastrana">
<div class="datumivreme">

<?php
echo date("l jS \of F Y ") . "<br>";

?>
</div>
<table class="kontakttabela">
<tr>
<td><u>Kontakt telefoni</u></td>
</tr>
<tr>
<td>Beograd</td>
</tr>
<tr>
<td class="tel" >+381 11 664 99 99</td>
</tr>
<tr>
<td class="tel" >+381 11 7617 668</td>
</tr>
<tr>
<td>Novi Sad</td>
</tr>
<tr>
<td class="tel">+381 11 664 99 99</td>
</tr>
</table>
<a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=Gitare"><img src="spojnica1.jpg"   class="gitare3" ></a>
<a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=Gitare"><img src="group-of-guitars.jpg"  id="slike1" class="gitare4" ></a>
</div>

<div class="sredina"> 

<table id="podtabela" class="prikaz" style="display:none">
<tr>
<td><a href="javascript:void(0);" id="dugme_id" onclick="func(this.id);" >Pretraga</a></td>
</tr>

<tr>
<td><a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=Bubnjevi">Bubnjevi</a></td>
</tr>

<tr>
<td><a href="http://localhost/prodavnicainstrumenata/proizvodi?GrupaProizvoda=Gitare">Gitare</a></td>
</tr>

<tr>
<td><a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=&CenaMin=&CenaMax=&NazivProizvoda=">Sve</a></td>
</tr>
</table>


<form  action="proizvodi.php" method="get" id="drop_submit" name="forma" style="display:none" class="pretraga">
Cenaod: <input type="number" name="CenaMin" style="width:18.3%"/> 
do: <input type="number" name="CenaMax" style="width:18.3%" /> din.
<br/>
GrupaProizvoda : 
<select name="GrupaProizvoda">
<option value="Bubnjevi" selected> Bubnjevi</option>
<option value="Gitare" > Gitare</option>
<option value="Sve" > Sve</option>
</select>
<br/>
Naziv proizvoda : <input type="text" name="NazivProizvoda"></><br/>
<input type="submit" name="unos" value="Traži" />
</form>

<div id="pomeraj" class="pomeraj">
<a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=Bubnjevi"><img src="247drums21.jpg" id="slike2" class="bubnjevi" ></a>
</div>
</div>

<div class="dno">
<table class="dno">
<tr>
<td style="width:50%;margin-top:10px"><b>Beograd</b></td>
<td style="width:50%;margin-top:10px"><b>Novi sad</b></td>
</tr>
<tr>
<td>Kneza Miloša 95</td>
<td>Bulevar oslobođenja 83</td>
</tr>
<tr>
<td>bgshop@majstor.com</td>
<td>nsshop@majstor.com</td>
</tr>
</table>
</div>
</div>

</body>
</html>
