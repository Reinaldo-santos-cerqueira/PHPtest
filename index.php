<?php

$servername = "localhost";
$database = "ceptest";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP teste</title>
  </head>
  <body>
      <div class="container">
        <h1 class="text-center">Buscador de CEP</h1>
        <form  method="GET"action="http://localhost/PHPtest/index.php">
            <div class="inputArea">
              <label for="">CEP</label>
              <input type="text" class="form-control" maxlength="8" minlength="8s"
              id="CEP" name="CEP" placeholder="Digite seu cep"
              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
            <button type="submit" class="btn btn-success">Buscar dados</button>
            <?php
                if(isset( $_GET['CEP'])){
                                        
                    if($_GET['CEP'] == ""){
                        echo "<script>alert('Preencha todos os campos')</script>";
                    }else{
                        $query = "SELECT COUNT(CEP_COD) FROM CEP WHERE CEP = '".$_GET['CEP']."'";
                        
                        $result_query = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_row($result_query)){
                            if($row[0] == 0){
                                try{
                                $cep = $_GET['CEP'];
                                
                                $link = "https://viacep.com.br/ws/".$cep."/xml/";
                                
                                $xml = simplexml_load_file($link);

                                    echo "<p style='color=#fff'>CEP: ".$xml -> cep.";</p>";
                                    echo "<p style='color=#fff'>Logradouro: ".$xml -> logradouro.";</p>";
                                    echo "<p style='color=#fff'>Complemento: ".$xml -> complemento.";</p>";
                                    echo "<p style='color=#fff'>Bairro: ".$xml -> bairro.";</p>";
                                    echo "<p style='color=#fff'>Localidade: ".$xml -> localidade.";</p>";
                                    echo "<p style='color=#fff'>UF: ".$xml -> uf.";</p>";
                                    echo "<p style='color=#fff'>IBGE: ".$xml -> ibge.";</p>";
                                    echo "<p style='color=#fff'>GIA: ".$xml -> gia.";</p>";
                                    echo "<p style='color=#fff'>DDD: ".$xml -> ddd.";</p>";
                                    echo "<p style='color=#fff'>SIAFI: ".$xml -> siafi.";</p>";

                                if($xml->cep){
                                    $cepExplode = explode("-",$xml -> cep);
                                    
                                    $cepFormat = $cepExplode[0]."".$cepExplode[1];
                                    $logradouro = $xml -> logradouro;
                                    $complemento = $xml -> complemento;
                                    $bairro = $xml -> bairro;
                                    $localidade = $xml -> localidade;
                                    $uf = $xml -> uf;
                                    $gia = $xml -> gia;
                                    $ddd = $xml -> ddd;
                                    $siafi = $xml -> siafi;
                                    $ibge = $xml -> ibge;
                                    
                                    $queryInsert = " INSERT INTO CEP (LOGRADOURO,CEP,COMPLEMENTO,BAIRRO,LOCALIDADE,UF,IBGE,GIA,DDD,SIAFI) VALUES('".$logradouro."','".$cepFormat."','".$complemento."','".$bairro."','".$localidade."','".$uf."','".$ibge."','".$gia."','".$ddd."','".$siafi."')";
                                    
                                    $result_query_add_cep = mysqli_query($conn,$queryInsert);
                                    
                                    if(!$result_query_add_cep){
                                        die("Erro");
                                    }
                                }else{
                                    echo "Consulta invalida";
                                }
                            }catch(exception $e){
                                echo "Error ao consultar a api";
                            }
                            }else{
                                $queryCep = "SELECT * FROM CEP WHERE CEP = '".$_GET['CEP']."'";
                                $result_query_Cep = mysqli_query($conn,$queryCep);
                                while($rowAll = mysqli_fetch_row($result_query_Cep)){
                                    echo "<p>CEP:".$rowAll[2]."</p>";
                                    echo "<p style='color=#fff'>Logradouro: ".$rowAll[1].";</p>";
                                    echo "<p style='color=#fff'>Complemento: ".$rowAll[10].";</p>";
                                    echo "<p style='color=#fff'>Bairro: ".$rowAll[3].";</p>";
                                    echo "<p style='color=#fff'>Localidade: ".$rowAll[4].";</p>";
                                    echo "<p style='color=#fff'>UF: ".$rowAll[5].";</p>";
                                    echo "<p style='color=#fff'>IBGE: ".$rowAll[6].";</p>";
                                    echo "<p style='color=#fff'>GIA: ".$rowAll[7].";</p>";
                                    echo "<p style='color=#fff'>DDD: ".$rowAll[9].";</p>";
                                    echo "<p style='color=#fff'>SIAFI: ".$rowAll[8].";</p>";
                                }
                            }
                            
                        }

                        if(!$result_query){
                            die("ERROR");
                        }
                    }
                }

        ?>
        </form>

      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="./js/index.js"></script>

  </body>
</html>
<?php

mysqli_close($conn);

?>