Napraviti datoteku "search1.php"
Skripta ispisuje obrazac za unos OIB-a. 
Nakon upisa i slanja obrasca, prona�i osobu sa tim OIB-om
u bazi "gradjani.txt" i ispisati sve podatke o toj osobi.
Ako osoba nije prona�ena vratiti korisnika na po�etnu stranicu
uz poruku "Te osobe nema u bazi" (header i $_GET).



<?php

if(!$_POST){
    if(isset($_GET['poruka'])){
        echo '<h1>Osoba nije pronadjena</h1>';
    }
?>
  <form method="post" action="">
    <p>OIB: <input type="text" name="oib"> </p>
       <p><input type="submit" name="submit" value="Unesi"> </p>
  </form>
<?php
}
else {
    // pokupiti podatke
    $oib = $_POST['oib'];
    
    $f = fopen('gradjani.txt','r');

    $nasao = false;
    
    while (($redak = fgets($f, 4096)) !== false) {
        $polje = explode("\t",$redak); 
        if($oib == $polje[0]){
            $nasao = true;
            break;
        }
    }
    
    if($nasao){
        foreach($polje as $p){
            echo $p.' --- ';
        }
        echo '<br>';
    }
    else {
        header('Location: search1.php?poruka=1');
    }
    
    fclose($f);    
}
?>
