<!DOCTYPE html>
<html>
<head>
<title>Pretraga</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="prodavnicainstrumenata.js"></script>
<link rel="stylesheet" href="prodavnicainstrumenata.css">


</head>
<body onload = "startTimer(),startTimer1(),startTimer2()">

<div  class="content"> 
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
<td><a href="http://localhost/prodavnicainstrumenata/proizvodi.php?GrupaProizvoda=Gitare">Gitare</a></td>
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
</select>
<br/>
Naziv proizvoda : <input type="text" name="NazivProizvoda"></><br/>
<input type="submit" name="unos" value="Traži" />
</form>



<?php



//provarava da li su prazni ili nisu poslati CenaMin i CenaMax i GrupaProizvoda


if (empty($_GET['CenaMin'])||!isset($_GET['CenaMin'])){$CenaMin = "";} 
//Proverava da li su prazni svi koji slede
else if ((empty($_GET['CenaMax'])||!isset($_GET['CenaMax']))&&(empty($_GET['GrupaProizvoda'])||!isset($_GET['GrupaProizvoda'])||($_GET['GrupaProizvoda']==="Sve"))&&(empty($_GET['NazivProizvoda'])||!isset($_GET['NazivProizvoda']))){$CenaMin = "Cena>=". $_GET['CenaMin'];} 
else {$CenaMin = "Cena>=". $_GET['CenaMin'] ." AND ";}

if (empty($_GET['CenaMax'])||!isset($_GET['CenaMax'])){$CenaMax = "";} 
//Proverava da li su prazni svi koji slede
else if ((empty($_GET['GrupaProizvoda'])||!isset($_GET['GrupaProizvoda'])||($_GET['GrupaProizvoda']==="Sve"))&&(empty($_GET['NazivProizvoda'])||!isset($_GET['NazivProizvoda']))){$CenaMax = "Cena<=". $_GET['CenaMax'];}
else $CenaMax = "Cena<=". $_GET['CenaMax'] ." AND ";


if (empty($_GET['GrupaProizvoda'])||!isset($_GET['GrupaProizvoda'])||$_GET['GrupaProizvoda']==="Sve"){$SGrupeProizvoda = "";} else {

$GrupaProizvoda = trim ($_GET['GrupaProizvoda']);
include "konekcija.php";

$sql1 = "SELECT SifraGrupeProizvoda FROM grupaproizvoda WHERE NazivGrupeProizvoda = '".$GrupaProizvoda."'";

$results = $mysqli->query($sql1);
while ($row = $results->fetch_array())
{
extract($row);
}
//Proverava da li ima NazivaProizvoda koji je sledeci u upitu

if ((empty($_GET['NazivProizvoda']))||(!isset($_GET['NazivProizvoda']))){
$SGrupeProizvoda = "SifraGrupeProizvoda=" .$SifraGrupeProizvoda[0];
}
else
$SGrupeProizvoda = "SifraGrupeProizvoda=" .$SifraGrupeProizvoda[0]." AND ";
}

//Proverava da li je opcija za sortiranje podesena, ako nije stavlja default
if (!isset($_GET['sortiranje'])){
$prvi = 'NazivProizvoda';
$drugi = 'ASC';
}
else {
$Sort = $_GET['sortiranje'];
//Prolazi sve opcije za sortiranje
if ($Sort=="jedan") {
$prvi = 'NazivProizvoda';
$drugi = 'ASC';
}
elseif ($Sort=="dva"){
$prvi = 'NazivProizvoda';
$drugi = 'DESC';
}
elseif ($Sort=="tri"){
$prvi = 'Cena';
$drugi = 'ASC';
}
else {
$prvi = 'Cena';
$drugi = 'DESC';
}

}


include "konekcija.php";


$sql2 = "SELECT NazivProizvoda FROM proizvod";
$NazivProizvodaNiz = array();
$NazivProizvodaKolona = $mysqli->query($sql2);
while ($red=$NazivProizvodaKolona->fetch_array())
{
//Ako je naziv proizvoda prazan ili nije poslat
if (empty($_GET['NazivProizvoda'])||!isset($_GET['NazivProizvoda'])){$NazivProizvodaNiz[]= "";}
//Ako slova nisu nadjena ni u jednom nazivu
else if (stripos($red["NazivProizvoda"],$_GET['NazivProizvoda']) === false){$NazivProizvodaNiz[]="NazivProizvoda = 'ovaj proizvod ne postoji'";}
//Ako je nadjen naziv sa odgovarajucim recima ubacije se u niz
else //if ((!empty($_GET['CenaMin']))||(!empty($_GET['CenaMax']))||(!empty($_GET['GrupaProizvoda']))) 
{   
 $NazivProizvodaNiz[]=" NazivProizvoda IN ('".$red["NazivProizvoda"]."')";
}
}
$broj = count ($NazivProizvodaNiz);
$sql = array(); 

for ($i=0 ; $i<=($broj-1) ; $i++){
if(empty($_GET['CenaMin'])&&empty($_GET['CenaMax'])&&empty($_GET['GrupaProizvoda'])&&empty($_GET['NazivProizvoda'])){
$sql[$i] = "SELECT NazivProizvoda, Cena FROM proizvod";
}
else{
$sql[$i] = "SELECT NazivProizvoda, Cena FROM proizvod WHERE ".$CenaMin." ".$CenaMax." ".$SGrupeProizvoda." ".$NazivProizvodaNiz[$i];

}

$sql3="SELECT NazivProizvoda,Cena FROM proizvod WHERE 1=0";
}

for ($i=0 ; $i<=($broj-1) ; $i++){
$sql3= " ".$sql[$i]." UNION ".$sql3."";
}

$sql4= " ".$sql3." ORDER BY $prvi $drugi ";

if (!$q=$mysqli->query($sql4))
{
echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
die();
}

if ($q->num_rows==0)
{
?>
<p class="poruke">
Nema takvih proizvoda
</p>
<?php 
} 



else {
?>
<table class="rezultat">
<tr>
<td><b>Naziv</b></td>
<td><b>Cena</b></td>
</tr>
<?php
while ($red=$q->fetch_array())
{
?>
<tr>
<td><?php echo $red["NazivProizvoda"]?></td>
<td><?php echo $red["Cena"]?></td>
</tr>
<?php
}
?>
</table>
<?php


$mysqli->close();

?>
<form action="proizvodi.php" method="get" id="drop_submit" name="forma1" style="text-align:center;font-family:Verdana;font-size:15px;">
<input type="hidden" name="CenaMin" <?php if (isset($_GET['CenaMin'])){echo "value='". $_GET['CenaMin']."'";}  ?>"/>
<input type="hidden" name="CenaMax" <?php if (isset($_GET['CenaMax'])){echo "value='". $_GET['CenaMax']."'";}  ?>/>
<input type="hidden" name="GrupaProizvoda" value="<?php if (isset($_GET['GrupaProizvoda'])){echo $_GET['GrupaProizvoda'];} else echo "" ?>"/>
<input type="hidden" name="NazivProizvoda" value="<?php if (isset($_GET['NazivProizvoda'])){echo $_GET['NazivProizvoda'];} else echo "" ?>"/>
Sortiraj po : <select name="sortiranje" onchange="document.forma1.submit()" style="font-family: Verdana" >
<option <?php if (!isset($_GET['sortiranje'])||($_GET['sortiranje'] == 'jedan')) echo "selected"; ?>  id=1 value="jedan" > Nazivu od A do W</option>
<option <?php if (isset($_GET['sortiranje'])&&($_GET['sortiranje'] == 'dva')) echo "selected"; ?>  id=2 value="dva"  > Nazivu od W do A</option>
<option <?php if (isset($_GET['sortiranje'])&&($_GET['sortiranje'] == 'tri')) echo "selected"; ?>  id=3 value="tri"  > Ceni od najniže</option>
<option <?php if (isset($_GET['sortiranje'])&&($_GET['sortiranje'] == 'cetiri')) echo "selected"; ?>  id=4 value="cetiri"  > Ceni od najviše</option>
</select> 

</form>
<?php
}
?>
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