<?php

require_once 'Conexao.php';

 //cria um objeto do tipo conexao
 $conexao = new Conexao();
 //cria a conexao com o banco de dados
 $conn = $conexao->getConection();
 //cria query de seleção
 $query = "SELECT * FROM imovel";
 //Prepara a query para execução
 $stmt = $conn->prepare($query);
 //Cria um array para receber o resultado da seleção
 $result = array();
 //executa a query
 if ($stmt->execute()) {
     //o resultado da busca será retornado como um objeto da classe
     while ($rs = $stmt->fetchObject()) {
         //armazena esse objeto em uma posição do vetor
         print_r($rs->id);
        echo '<img src="data:'.$rs->fotoTipo.';base64,'.base64_encode($rs->foto).'">';

     }
 }

/*
$sql = "select * from vw_fotos_alunos";
$r = mysqli_query($obj, $sql);
        while($row = mysqli_fetch_array($r)){
                $arquivo = "/usr/local/script/fotos/".$row['NREGALUN'].".jpg";
                file_put_contents($arquivo,$row['FOTO']);
                $fp = fopen($arquivo,"rb");
                $tamanho = filesize($arquivo);
                $conteudo = fread($fp,$tamanho);
                fclose($fp);
                $conteudo = addslashes($conteudo);
                $ins = "insert into DACvw_fotos_alunos values ('{$row['NREGALUN']}',
                        '{$conteudo}')";
                mysqli_query($con, $ins);
                unlink($arquivo);

        }
*/