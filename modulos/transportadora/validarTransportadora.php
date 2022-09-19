<?php
	require_once 'classes/transportadora.class.php';

	$objFc = new funcoes();
	$objTr = new transportadora();
	
	if(isset($_GET["a"])){

		switch($_GET["a"]){

			//CADASTRAR TRANSPORTADORA
			case 'cadastrar':
				if($objTr->queryInsert($_POST) == 'ok') {
					echo "<script>location.replace('index.php?m=transportadora&p=adicionarTransportadora.php');</script>";	
					$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Transportadora cadastrada com sucesso</span></div>";
				} else {
					$_SESSION['alertaMensagemErro'] = "<img src='img/notification/imgErro.png' class='mensagemErro'><div id='boxAlerta'><h1>ERRO</h1><span>Não foi possível cadastrar a transportadora</span></div>";
					echo "<script>history.go(-1);</script>";
				}
			break;

			case 'status':
				$transportadora = $objTr->querySeleciona($_GET['idTransportadora']);
				$status = $transportadora['statusTransportadora'];

				if ($status == "1"){
					if($objTr->queryUpdateStatus($_GET['idTransportadora'],"0") == 'ok') {
						echo "<script>location.replace('index.php?m=transportadora&p=listarTransportadoras.php');</script>";	
						$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Transportadora desativada com sucesso</span></div>";
					} else {
						$_SESSION['alertaMensagemErro'] = "<img src='img/notification/imgErro.png' class='mensagemErro'><div id='boxAlerta'><h1>ERRO</h1><span>Não foi possível desativar a transportadora</span></div>";
						echo "<script>history.go(-1);</script>";
					}
				} else {
					if($objTr->queryUpdateStatus($_GET['idTransportadora'],"1") == 'ok') {
						echo "<script>location.replace('index.php?m=transportadora&p=listarTransportadoras.php');</script>";	
						$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Transportadora ativada com sucesso</span></div>";
					} else {
						$_SESSION['alertaMensagemErro'] = "<img src='img/notification/imgErro.png' class='mensagemErro'><div id='boxAlerta'><h1>ERRO</h1><span>Não foi possível ativar a transportadora</span></div>";
						echo "<script>history.go(-1);</script>";
					}
				}
			break;

		}
	}
?>