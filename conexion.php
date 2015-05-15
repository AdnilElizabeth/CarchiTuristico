
<?php
    $host="localhost";
    $port="5432";
    $user="postgres";
    //$pass="root";
    $pass="rootdow";
    $dbname="turismo";

    $connect = pg_connect("host=$host port=$port user=$user password=$pass dbname=$dbname");

    if(!$connect){
        echo "<p><i>No me conecte</i></p>";
         header("HTTP/1.1 500 Internal Server Error");
    echo $query.'\n';
    echo pg_error();
    }
    else
    {
        echo "<p><i>Me conecte</i></p>";    
    $rows = array();
    while($r = pg_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);
    }
    pg_close($connect);
?>

