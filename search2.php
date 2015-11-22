   Napraviti datoteku "search2.php"
   Skripta prikazuje padajucu listu svih postanskih brojeva.
   Nakon odabira jedne vrijednosti ispisati sve podatke 
   o osobama koje zive u tom mjestu (u gradjani.txt)  

<?php

if(!$_POST){
?>
  <form method="post" action="">
    <p>Poštanski broj:  
    <select name="postbr">
        <?php
        // OTVORITI DATOTEKU postanski.txt ZA CITANJE
        $f = fopen('postanski.txt','r');
        // ZA SVAKI REDAK U DATOTECI ISPISATI:
        while (($redak = fgets($f, 4096)) !== false) {
            $polje = explode("\t",$redak);
echo '<option value="'.$polje[0].'">'.$polje[0].'-'.$polje[1].'</option>'; 
        }
        // ZATVORITI DATOTEKU
        fclose($f);
        ?>
    </select> </p>
    <p><input type="submit" name="submit" value="Unesi"> </p>
  </form>
<?php
}
else {
    // pokupiti podatke
    $postbr = $_POST['postbr'];
    $f = fopen('gradjani.txt','r');
    
    while (($redak = fgets($f, 4096)) !== false) {
        $polje = explode("\t",$redak); 
        if($postbr == trim($polje[4])){
              foreach($polje as $p){
                    echo $p.' --- ';
              }
              echo '<br>';
        }
    }
    fclose($f);    
}
