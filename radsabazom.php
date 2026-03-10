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


<?php

include "konekcija.php";
//proverava da li su zadati akcija i sifraProizvoda
if (isset ($_GET['akcija']) && isset ($_GET['SifraProizvoda'])){
$akcija = $_GET['akcija'];
$SifraProizvoda = $_GET['SifraProizvoda'];
switch ($akcija){
//ako je akcija brisanje brise zapis iz baze
case "brisanje":
$upit = "DELETE FROM proizvod WHERE SifraProizvoda = ".$SifraProizvoda;
if (!$q=$mysqli->query($upit)){
echo "<p class='poruke'>Nastala je greska pri izvodenju upita</p><br/>" . mysql_query();
die();
} else {
echo "<p class='poruke'>Brisanje proizvoda je uspešno!</p>";
}
break;
//ako je kliknuto na izmenu pored proizvoda koji zelimo da izmenimo
case "forma_za_izmenu":
$sql1="SELECT NazivProizvoda FROM proizvod WHERE SifraProizvoda=" .$_GET['SifraProizvoda']."";
$rez1=$mysqli->query($sql1);

$red1= $rez1->fetch_array();
$naziv1=$red1['NazivProizvoda'];
//sledi strana za izmenu proizvoda
?>

<h1>Izmena proizvoda <?php echo $naziv1?></h1>

<form method="post" class="izmena" action="?akcija=izmena&SifraProizvoda=<?php echo $_GET['SifraProizvoda'];?>">
Naziv : <input type="text" name="Naziv" /><br/>
Cena : <input type="number" name="Cena" /><br/>
<input type="submit" name="unos" style="font-family:Verdana;font-size:15px;" value="Ubaci" />
</form>
<?php
break;
//ako je popunjena forma za izmenu i kliknuto ubaci
case "izmena":
//izvrsava UPDATE nad bazom
if (isset ($_POST['Naziv']) && isset ($_POST['Cena'])){
$Naziv = $_POST['Naziv'];
$Cena = $_POST['Cena'];
$upit="UPDATE proizvod SET NazivProizvoda='". $Naziv ."', Cena='" . $Cena . "' WHERE SifraProizvoda=". $SifraProizvoda;
if ($mysqli->query($upit)){
if ($mysqli->affected_rows > 0 ){
echo "<p class='poruke'>Proizvod je uspešno izmenjen.</p>";
} else {
//greska ako proizvod nije izmenjen a nema greske u upitu
echo "<p class='poruke'>Proizvod nije izmenjen.</p>";
}
} else {
//greska ako ima greske u upitu
echo "<p class='poruke'>Nastala je greška pri izmeni Proizvoda</p>" . mysql_error();
}
} else {
//greska ako nisu prosledjeni naziv i cena
echo "<p class='poruke'>Nisu prosleđeni parametri za izmenu";
}
break;
default:
//ako se desi da je akcija koja nije medju navedena
echo "<p class='poruke'>Nepostojeća akcija!</p>";
break;
}
}
//Ispisuje proizvode iz baze zajedno sa opcijama za njihovu izmenu i brisanje
$sql1="SELECT SifraProizvoda, NazivProizvoda, Cena FROM proizvod";
if (!$q=$mysqli->query($sql1)){
echo "<p class='poruke'>Nastala je greska pri izvodenju upita</p><br>" . $mysqli->query($sql1);
die();
}
if ($q->num_rows==0)
{
echo "<p class='poruke'>Nema proizvoda</p>";
} 
else {
?>


<table class="baza">
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
<td><a class="editlinkovi" href="?akcija=forma_za_izmenu&SifraProizvoda=<?php echo $red["SifraProizvoda"]?>">Izmena</a></td>

<td><a class="editlinkovi" href="?akcija=brisanje&SifraProizvoda=<?php echo $red["SifraProizvoda"]?>">Brisanje</a></td>

</tr>

<?php
}
//link za ubacivanje proizvoda
?>

<td><a  class="editlinkovi" href='http://localhost/prodavnicainstrumenata/ubacivanje.php' value="Insert" >Ubaci Proizvod</a></td>
</table>
<?php
}
$mysqli->close();

//link za povratak na pocetnu stranu
?>

<a href="http://localhost/prodavnicainstrumenata/proizvodi.php" class="linkpovratak">Povratak na pocetnu stranu</a>

<!--uobicajeni deo-->
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


