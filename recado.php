<?php
    session_start();
    if(empty($_POST) or (empty($_POST['recado']) or (empty($_POST['data'])))){
        echo"<script> location.href='excluir_recado.php;' </script>"; 
    }
    include("config.php");
    $recado = $_POST['recado'];
    $data = $_POST['data'];
    $sql = "select * from tbrecado where
    recado = '$recado' and data = '$data'";
    $res = $conn->query($sql) or die($conn->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;
    if($qtd > 0 ){
        $_SESSION["recado"] = $row->recado;
        $_SESSION["data"] = $row->data;
     
        echo"<script> location.href='portal.php' </script>";
    }

 ?>