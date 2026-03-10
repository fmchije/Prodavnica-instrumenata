
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

<h1>Unesi proizvod</h1>

<form method="post" action="" class="unos">
Naziv : <input type="text" name="Naziv" /><br/>
Cena : <input type="number" name="Cena" /><br/>
GrupaProizvoda : <select name="GrupaProizvoda">
<option value="Bubnjevi" selected> Bubnjevi</option>
<option value="Gitare" > Gitare</option>
</select><br/>
<input type="submit" name="unos" value="Ubaci" />
</form>
<a href="http://localhost/prodavnicainstrumenata/radsabazom.php" class="linkpovratak">Povratak na bazu</a>
<?php
if (isset($_POST["unos"])){
//Prikupljanje podataka sa forme

if (isset($_POST['Naziv'])&&isset($_POST['Cena'])&&isset($_POST['GrupaProizvoda'])){
$Naziv = $_POST['Naziv'];
$Cena = $_POST['Cena'];
$GrupaProizvoda = $_POST['GrupaProizvoda'];
include "konekcija.php";
$sql1 = "SELECT SifraGrupeProizvoda FROM grupaproizvoda WHERE NazivGrupeProizvoda = '".$GrupaProizvoda."'";

$results = $mysqli->query($sql1);
while ($row = $results->fetch_array())
{
extract($row);
}


$SGrupeProizvoda = $SifraGrupeProizvoda[0];

//Operacije nad bazom
$sql="INSERT INTO proizvod (NazivProizvoda, Cena,SifraGrupeProizvoda) VALUES ('".$Naziv."', '".$Cena."','".$SGrupeProizvoda."')";
if ($mysqli->query($sql))
{
echo "<p class='poruke'>Proizvod je uspešno ubačen</p>";
} 
else {
echo "<p class='poruke'>Nastala je greška pri ubacivanju proizvoda</p>" . mysql_error();
}
} else {
//Ako POST parametri nisu prosleđeni
echo "<p class='poruke'Nisu prosleđeni parametri!</p>";
}
$mysqli->close();
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




