<!DOCTYPE html>
<html>
<head>
	<title>Das Auto</title>
	<meta charset="UTF-8">
	<link rel="import"  href="../css/headers.html">
</head>
<body>


<!-- Default Navbars -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
			 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<a href="../mainPage.php" class="navbar-brand"> <i class="fas fa-car"></i> Strona Główna</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
		<ul class="nav navbar-nav">
			<li><a href="history.php">Historia</a></li>
			<li><a href="../articles/Articles.php">Wpisy</a></li>
			<li><a href="../contact/contact.php">Kontakt</a></li>
		</ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();

                if(isset($_SESSION["username"]))
                {
                    echo '
 	                <li><a>Witaj, ' .$_SESSION["username"].'</a></li>
                    <li><a href="../log/logout.php">Logout</a></li>
                    ';
                }else{
                    echo '<li><a href="../log/log.php"> Zaloguj</a></li>';
                }
                ?>
            </ul>
	</div>
	</div>
	</nav>
<!--  -->

<div style="  font-size: 15px;" class="container">
	<div class="jumbotron"">

		<h1>Historia</h1>
		<p class="text-justify">
		Historia rozwoju motoryzacji w Niemczech jest niezwykle urozmaicona. Przyczyniły się do tego nie tylko prężnie rozwijające się wytwórnie aut, ale także sztuczny podział Niemiec po zakończeniu II wojny światowej na dwa niezależne państwa, z których jedno rozwijało się, a wraz z nim jego przemysł samochodowy, w oparciu o zasady wolnorynkowe, podczas gdy w drugim hamulcami jakiegokolwiek postępu były doktryny komunistyczne i pomysły dyletantów, którym nieopatrznie dano do rąk pełnię władzy nad gospodarką.
		</p>
		<p class="text-justify">
		Pierwszą niemiecką konstrukcją, którą można uznać za prototypowy pojazd samobieżny, był trójkołowiec napędzany benzynowym silnikiem spalinowym, skonstruowany w 1886 roku przez Karla Friedricha Benz’a. Od jego nazwiska pochodzi nazwa paliwa do silników z zapłonem iskrowym – benzyny. Benz zdawał sobie sprawę, że jego wynalazek ma ogromne znaczenie, toteż szybko go opatentował i potem ze sprzedaży patentu czerpał przez wiele lat niemałe korzyści. Rok wcześniej inny niemiecki konstruktor, Wihelm Maybach, współpracujący z przemysłowcem i również konstruktorem Gottliebem Däumler’em, znanym bardziej jako Daimler, konstruuje prawdopodobnie jako pierwszy na świecie, motocykl. Miał on jednocylindrowy silnik o mocy około 0,5 KM.  Daimler uzyskuje na niego patent i pozwala Maybachowi rozpocząć prace nad swoim samochodem, całkowicie niezależnie od Benz’a. Pojazd ten powstaje w 1887 roku, a następnie zostaje zaprezentowany na światowej wystawie w Paryżu.
		</p>
		<p class="text-justify">
		W 1888 roku w interesujący sposób zostają zademonstrowane światu walory pojazdu, stworzonego przez Benz’a. Jego żona Bertha, podobno bez jego wiedzy i zgody wyruszyła o świcie 5 sierpnia wraz ze swoimi nastoletnimi synami pojazdem, oznaczonym jako Benz Patent-Motorwagen Nummer 3 w daleką podróż z Mannheim do Pforzheim. Bez pomocy mechaników pokonała wówczas dystans 108 km, po raz pierwszy w historii motoryzacji przekraczając barierę 100 km. Do celu dotarła późnym wieczorem, nie bez przygód. Własnoręcznie musiała usunąć kilka usterek, które pokazały producentowi słabe strony pojazdu.  
		</p>
		<p class="text-justify">
		W 1922 roku zakłady lotnicze Bayerische Flugzeug-Werke łączą się z wytwórnią silników Bayerische Motorenwerke, dając początek koncernowi BMW.
		</p>
		<p class="text-justify">
		W 1926 roku konkurujące ze sobą firmy  Daimler Motorengesellschaft i Benz & Cie tworzą spółkę Daimler-Benz AG, która już wkrótce staje się jedną z najbardziej znanych światowych wytwórni luksusowych samochodów.
		</p>
		<p class="text-justify">
		Lata poprzedzające wybuch II światowej były okresem intensywnego rozwoju produkcji pojazdów wojskowych i samolotów. Powstawały wówczas konstrukcje o niewiarygodnych walorach, jak silniki lotnicze wielkiej mocy, oraz motocykle dostosowane do eksploatacji w najtrudniejszych warunkach, na pustyniach Bliskiego Wschodu i Północnej Afryki.
		</p>
		<p class="text-justify">
		W 1945 roku, a więc niemal bezpośrednio po zakończeniu II wojny światowej,  taśmę montażową zakładów w Wolfsburgu opuszcza pierwszy Volkswagen o szokującym wyglądzie, nazywany popularnie „Garbusem”. Nie było to komfortowe auto, z wnętrzem o którym trudno powiedzieć, że było wygodne. Mimo to samochód ten stał się światowym przebojem i w różnych wersjach, z różnymi silnikami był produkowany jeszcze na początku XXI wieku w wielu montowniach i fabrykach, rozrzuconych po całym niemal świecie.  
		</p>
		<p class="text-justify">
		Pod koniec lat pięćdziesiątych pojawiły się pierwsze produkty myśli technicznej wschodnioniemieckich konstruktorów. Były to produkowane w dawnych zakładach BMW w Eisenach Wartburgi. Wcześniej zakłady te kontynuowały przedwojenną produkcję modeli BMW, ze zmienioną marką, początkowo jako EMW, potem ­– IFA F9. Wartburg był, jak na socrealistyczne czasy, pojazdem luksusowym, niedostępnym dla kieszeni nawet najbogatszego robotnika. Toteż w tym czasie powstała w zakładach w Zwickau przedziwna konstrukcja, oparta częściowo na rozwiązaniach auta DKW7, z drewnianym nadwoziem pokrytym płatami tworzywa sztucznego – duroplastu. Auto, nazwane P70 to miało prymitywny dwusuwowy silnik o pojemności 0,7 l i niesynchronizowaną trzybiegową skrzynię biegów.
		</p>
		<p class="text-justify">
		Następcą P70 był prymitywny, małolitrażowy Trabant, z silnikiem chłodzonym powietrzem, początkowo o pojemności 500 cm sześciennych, potem – 600 cm sześciennych, o mocy najpierw 18 KM, potem 26 KM a pod koniec produkcji nawet 26 KM. Trabanty z racji wyglądu i prymitywnej konstrukcji nazywano bardzo różnie, „mydelniczkami”, „karmą dla myszy” (podobno duroplast bardzo im smakował), „trampkami” (był to rodzaj lekkich bytów sportowych), w końcu „zemstą Honeckera”, a nawet „Fordem karton” i „karton-Corwettą”.  W ostatnich modelach Trabanta na przełomie lat osiemdziesiątych i dziewięćdziesiątych przez krótki okres montowano silniki czterosuwowe 1,05 (1,1) l od Volkswagena Polo. 
		</p>
	</div>
	
		</div>
	</div>
</div>



<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>