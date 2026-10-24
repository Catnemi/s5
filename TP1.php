 Exercice 1
<html>

 <head>
     <title>
         Hello world
     </title>
 </head>

 <body>
        <php echo "hello world <br>";
        $var = "En francais:";
        echo $var;
        $var2 = "Bjr tout <strong> le monde </strong> </br>";
        echo $var2;
        echo "La version de pHp installe sur etudiant est " . phpversion() . "</br>";
        $t_var = gettype($var); // t_var devient string, car $var est un string
        echo "var est de type $t_var</br>";
        $var = "5";
        if (is_string($var))
            echo "var est tjr de type cHAINE DE CHAR</br>";
        $var = 3;
        echo "ici var est un type s, son double est egale a d" . gettype($var) . ($var * 2);
        ?> 
 </body>

 </html>// script.js
document.getElementByld("go").onclick = () =>{
const n = Math.floor(Math.random() * 100) + 1;
document.getElementByld("out").textContent = "Nombre tiré : " + n; */-->\

 Exercice 2

  <!DOCTYPE html>
 <html lang="francais">

 <head>
   Tableau indexe
 </head>

 <body>
   <?php
    $notes = array("do", "re", "mi", "fa", "sol", "la", "si", "do");
    echo implode(" ", $notes);
    $tableau[] = $notes;
    //Methode 1 pour ajouter les elements du tab // Sans $tableau[] = $notes; 
    /* $notes = ["do", "re", "mi", "fa", "sol", "la", "si"];
    $tab=[]; 
    foreach($notes as $note){
    $tab[]=$notes
    }*/
    foreach ($tableau as $key => $note) {
      echo $key . " " . implode("<br>", $note); //On ajoute implode pour aider php a concatener les chaines du tab
    }
    $notesFreq[0] = ["do", "1"]; //note,rapport
    $notesFreq[1] = ["re", "9/8"];
    $notesFreq[2] = ["mi", "5/4"];
    $notesFreq[3] = ["fa", "4/3"];
    $notesFreq[4] = ["so", "3/2"];
    $notesFreq[5] = ["la", "5/3"];
    $notesFreq[6] = ["si", "15/8"];
    $notesFreq[7] = ["do", "2"];
    for ($i = 0; $i <= count($notesFreq); $i++) {
      echo $notesFreq[$i][0] . " " . "=" . " " . $notesFreq[$i][1] . "</br>";
    }
    $notesFreqAssoc["do"] = "1";
    $notesFreqAssoc["re"] = "9/8";
    $notesFreqAssoc["mi"] = "5/4";
    $notesFreqAssoc["fa"] = "4/3";
    $notesFreqAssoc["so"] = "3/2";
    $notesFreqAssoc["la"] = "5/3";
    $notesFreqAssoc["si"] = "15/8";
    $notesFreqAssoc["do"] = "2";
    foreach ($notesFreqAssoc as $key => $Rapp) {
      echo  $key . " " . "=" . "   " . $Rapp . "<br>";
    }
    var_dump($notesFreq, $notesFreqAssoc);
    ?>
 </body>

 </html> 
 exercice 3 

 <!DOCTYPE html>
 <html lang="francais">

 <head>

 </head>

 <body>
   <?php
    $texte = "php est un langage de programmation puissant";
    echo "=" . strlen($texte)   . "<br>";
    echo "=" . strtoupper($texte) . "<br>";
    echo "=" . strtolower($texte) . "<br>";
    echo "=" . str_replace("puissant", "flexible", $texte) . "<br>";
    echo "=" . substr($texte, 4) . "<br>";
    echo "=" . strrev($texte) . "<br>";
    ?>
 </body>

 </html>
