//a je dugme(link) pretraga, a b je forma koju korisnik popunjava
function func(dugme_id) {
    var a=document.getElementById(dugme_id);
	var b=document.getElementById("drop_submit");
	if (a.textContent=="Pretraga"){
	a.textContent="Zatvori pretragu";
	b.style.display="block";
    
   }
	else{
	b.style.display="none"
	a.textContent="Pretraga";
	}
	}
//a je dugme(link) nasi proizvodi a b je podtabela koja se pojavi	
	function priktab(link_id) {
    var a=document.getElementById(link_id);
	var b=document.getElementById("podtabela");
	if (b.style.display=="none"){
	b.style.display="block";
	}
    else
	{
	b.style.display="none";
   }
   }
 //napravi niz sa svim slikama koje treba da se menjaju, tajmer se postavlja da na svake 3 sekunde poziva funkciju displayNextImage koja trenutnu zamenjuje sledecom
 //slika na levoj strani postaje postaje x-a u listi images
   function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1; // znaci if uslov onda je x=1 ako ne x=x+1
              document.getElementById("slike").src = images[x];
          }//isto samo se x smanjuje
          function displayPreviousImage() {
              x = (x <= 0) ? images.length - 1 : x - 1;
              document.getElementById("slike").src = images[x];
          }
//set interval kaze za koliko ce se i sta dogoditi, u ovom slucaju pokrenuti funkcija displayNextImage
          function startTimer() {
              setInterval(displayNextImage, 3000);
          }
//deklarise niz images i x postavlja na -1, niz puni slikama koje treba da se menjaju
          var images = [], x = -1;
          images[0] = "les paul.jpg";
          images[1] = "musical-instruments-81a.jpg";
          images[2] = "gibson_jimmy_page.jpg";
//sve isto samo za desne slike   
   function displayNextImage1() {
              y = (y === images1.length - 1) ? 0 : y + 1;
              document.getElementById("slike1").src = images1[y];
          }

          function displayPreviousImage1() {
              y = (y <= 0) ? images1.length - 1 : y - 1;
              document.getElementById("slike1").src = images1[y];
          }

          function startTimer1() {
              setInterval(displayNextImage1, 5300);
          }

          var images1 = [], y = -1;
          images1[0] = "Gibson_Les_Paul_Deluxe,_Guitar_shop,_Vancouver.jpg";
          images1[1] = "group-of-guitars.jpg";
   //sve isto samo za centralne slike
   function displayNextImage2() {
              z = (z === images2.length - 1) ? 0 : z + 1;
              document.getElementById("slike2").src = images2[z];
          }

          function displayPreviousImage1() {
              z = (z <= 0) ? images2.length - 1 : z - 1;
              document.getElementById("slike2").src = images2[z];
          }

          function startTimer2() {
              setInterval(displayNextImage2, 7300);
          }

          var images2 = [], z = -1;
          images2[0] = "drumcool-com-namm-2012-sonor-prolite-drum-kit.jpg";
          images2[1] = "247drums21.jpg";