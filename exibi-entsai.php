<!------ Projeto CCQ - Portaria - Programa Desenvolvido por Rinaldo Gama
Exibi as Entradas e Saidas de Visitantes  - Fechar o Movimento
---------->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">



<div class="row">                
            <div class="IconeRumo">
            <td height="30"><img src="imagens/logorumo.png" alt="" /></center>
            </div>
</div>
<div class="row">
  <div class="col-sm-6 col-md-7">
    <div class="thumbnail">
      <div class="caption">
        <h3><font color=#013765>Controle de Entrada e Saida de Visitantes</font></h3>
        <p><h6><p class="text-left">Projeto CCQ - Terminais - versão 1.0</h6></p></p>
        <p><a href="telainicial.php" class="btn btn-primary" role="button">Sair</a> <a href="exibi-entsai.php"; class="btn btn-default" role="button">Atualiza Dados</a></p>
      </div>
    </div>
  </div>
</div>

<?php

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('d/m/Y H:i:s', time());


//variáveis para conexão em LOCALHOST
include("conecta_db.php");
$link=conecta();
$busca = "SELECT * FROM tab_controle where entsai_saida IS NULL";
$verifica = mysql_query($busca,$link);
	
// Criamos uma tabela pra exebir os dados de entrada / saida

?>	
<table class='table table-hover table-striped'>
    <thead>
        <tr>
        <th>Nome</th>
        <th>Numero do Crachá</th>
        <th>Empresa</th>
        <th>Empresa a visitar</th>
		<th>Liberado entrada Por</th>
		<th>Data/Horario Entrada</th>
		<th>Data/Horario Saida</th>
		<th>Controle E/S</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($sql = mysql_fetch_array($verifica)){
            // Puxando dados do Banco de dados
				$ncracha=$sql['entsai_ncracha'];
                echo "\t\t\t<td>".$sql['entsai_nome']."</td>\n\t";
				echo "\t\t\t<td>".$sql['entsai_ncracha']."</td>\n\t";
				echo "\t\t\t<td>".$sql['entsai_empresa']."</td>\n\t";
				echo "\t\t\t<td>".$sql['entsai_empdestino']."</td>\n\t";
				echo "\t\t\t<td>".$sql['entsai_liberado']."</td>\n\t";
				echo "\t\t\t<td>".date('d/m/Y H:i:s', strtotime($sql['entsai_entrada']))."</td>\n\t";
				echo "\t\t\t<td>".$sql['entsai_saida']."</td>\n\t";
				//echo "\t\t\t<td><a href='darbaixa.php?id=$ncracha'> Encerrar Visita</a></td>\n\t";
				echo "\t\t<td><a class='btn btn-success btn-xs' href='darbaixa.php?id=$ncracha'>Encerrar Visita</a></td>\n\t";
                echo "\t</tr>\n\n\t\t<tr>\n";
                
            }
            ?>
        </tr>
    </tbody>
</table>




	



