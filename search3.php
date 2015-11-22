Napraviti datoteku "search3.php"
   Ispisati jedinstvenu listu postanskih brojeva koji se pojavljuju
   u bazi "gradjani.txt". Ispis mora sadr�avati sljede�e:
   NAZIV MJESTA - POSTANSKI BROJ - BROJ OSOBA IZ TOG MJESTA

<?php
$cisti = array();
$f = fopen('gradjani.txt', 'r');
while (($redak = fgets($f, 4096)) !== false) {
    $polje = explode("\t", $redak);
    // AKO TOG POSTANSKOG BROJA *NEMA* - DODAJ GA, 1 JER JE PRVI UNOS
    if(!in_array(trim($polje[4]), array_column($cisti, 'pbr'))){    
         $cisti[] = array('pbr'=>trim($polje[4]), 'broj'=>1);
    }
    // AKO GA IMA - UVECAJ BROJ LJUDI U TOM POST BROJU
    else{
        foreach($cisti as $c){
            if($c['pbr']==trim($polje[4])){
                $c['broj']++;
            }
        }
    }
}
fclose($f);

var_dump($cisti);
?>
