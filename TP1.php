<html>
    <head>
        <title>
            Hello world
        </title>
    </head>
    <body>
        <?php echo "hello world";
        <br>
        $var = "En francais:";
        echo $var;
        $var2 = "Bjr tout <strong> le monde </strong> </br>";
        echo $var2;
        echo "La version de pHp installe sur etudiant est ". phpversion();
    "</br>"
        $t_var = gettype($var);// t_var devient string, car $var est un string
        echo "var est de type $t_var</br>";
        $var = "$";
        if (is_string($var))
            echo "var est tjr de type cHAINE DE CHAR</br>";
        $var = 3;
        echo "ici var est un type s, son double est egale a d", gettype($var), $var * 2;
        ?>
    </body>
</html>
