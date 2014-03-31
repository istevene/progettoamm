
<!DOCTYPE html>
<html>
    <head>
        <title>Prova CSS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stile.css">

    </head>
    <body>
        <div id="page">
            <header>
            	<div id="logo">
                	<h1>Progetto di AMM</h1>
                </div>
            </header>
            
            <div id="sidebar1">
                <ul>
                    <li>Pagina 1</li>
                    <li>Pagina 2</li>
                    <li>Pagina 3</li>
                </ul>
                
            </div>
            
            <div id="sidebar2">
                <p>Barra di destra</p>
                <p>Tanto per.</p>
            </div>
            
            <div id="content">
                <h2>Benvenuto nel sito!</h2>
                <?
                    echo "Hello world! <br/>";
                    $saluto = "ciao";
                    $nome = "Stefano";
                    echo $saluto . " da " . $nome . "<br/><br/>";
                    $date = date('F');
                    $mesiInglesi = array("Gennaio" => "January",
                                        "Febbraio" => "February",
                                        "Marzo" => "March",
                                        "Aprile" => "April",
                                        "Maggio" => "May",
                                        "Giugno" => "June",
                                        "Luglio" => "July",
                                        "Agosto" => "August",
                                        "Settembre" => "September",
                                        "Ottobre" => "October",
                                        "Novembre" => "November",
                                        "Dicembre" => "December");                    

                                    
                    if( $date == $mesiInglesi["Marzo"]){
                        echo "Siamo a Marzo!<br/>";
                    } else {
                        echo "Non siamo a Marzo...<br/>";
                    }
                    
                    $somma=0;
                    
                    for($i=1; $i<=100; $i++){
                        $somma+=$i;
                    }
                    
                    echo "La somma dei primi 100 interi è $somma";
                    //dhgvfdgifk;
                    //phpinfo();
                ?>
            </div>
            
            <div id="clear">
                
            </div>
            
            <div id="footer">
                <p>
                    Stefano Lande
                </p>
                <p>
                    <a id="htmlval" href="http://validator.w3.org/check?uri=refer" target="_blank">HTML Valid</a>
    
                    <a id="cssval" href="http://jigsaw.w3.org/css-validator/check/refer" target="_blank">CSS Valid</a>
                </p>
            </div>
        </div>
    </body>
</html>
