<?php

	require_once 'classes/transportadora.class.php';

	$objFc = new funcoes();
	$objTr = new transportadora();
	
	if(isset($_GET["a"])){

		//VARIAVEL QUE DEFINE A ACAO A SER FEITA
		$acao = $_GET["a"];

		
		//CADASTRAR TRANSPORTADORA
		if ($acao == "cadastrar"){
			
			if($objTr->queryInsert($_POST) == 'ok') {
				echo "<script>location.replace('index.php?m=transportadora&p=adicionarTransportadora.php');</script>";	
				$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Transportadora cadastrada com sucesso</span></div>";
			} else {
				$_SESSION['alertaMensagemErro'] = "<img src='img/notification/imgErro.png' class='mensagemErro'><div id='boxAlerta'><h1>ERRO</h1><span>Não foi possível cadastrar a transportadora</span></div>";
				echo "<script>history.go(-1);</script>";
			}
			
		}
		//FIM DE CADASTRAR TRANSPORTADORA
		
		
		
		
		//EDITAR CATEGORIA
		if ($acao == "editarCategoria"){
			$idCategoria = $_POST["id"];
			$nomeCategoria = filter_input(INPUT_POST, 'nomeCategoria', FILTER_SANITIZE_STRING);
			$statusCategoria = filter_input(INPUT_POST, 'statusCategoria', FILTER_SANITIZE_STRING);

			$resultCategoria = "UPDATE categoria SET nomeCategoria = '$nomeCategoria', statusCategoria = '$statusCategoria' WHERE idCategoria = $idCategoria";
			$editarCategoria = mysqli_query($conn, $resultCategoria);

			if($editarCategoria){
				$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Categoria editada com sucesso</span></div>";
				echo "<script>location.replace('index.php?m=categorias&p=listarCategorias.php');</script>";
			} else {
				$_SESSION['alertaMensagemErro'] = "<img src='img/notification/imgErro.png' class='mensagemErro'><div id='boxAlerta'><h1>ERRO</h1><span>Não foi possível editar a categoria ".$nomeCategoria."</span></div>";
				echo "<script>history.go(-1);</script>";
			}
		}
		//FIM DE EDITAR CATEGORIA
		

			
		
		//EXCLUIR CATEGORIA	
		if ($acao == "excluirCategoria"){
			$idCategoria = $_GET["id"];
			$sqlCategoria = "DELETE FROM categoria WHERE idCategoria = '$idCategoria'";
        	$excluiCategoria = mysqli_query($conn, $sqlCategoria); 
			
			$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Categoria ".$nomeCategoria." excluída com sucesso</span></div>";
			echo "<script>location.replace('index.php?m=categorias&p=listarCategorias.php');</script>";
		}
		//FIM DE EXCLUIR CATEGORIA
		
		
				
		//ALTERAR STATUS DA CATEGORIA	
		if ($acao == "status"){
			
			$transportadora = $objTr->querySeleciona($_GET['idTransportadora']);
			$status = $transportadora['statusTransportadora'];

			if ($status == "1"){
				$statusTransportadora = 0;
				echo "<script>alert('$statusTransportadora');</script>";
				if($objTr->queryUpdateStatus($_GET['idTransportadora'],$statusTransportadora) == 'ok') {
					$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Transportadora desativada com sucesso</span></div>";
				} else {
					$_SESSION['alertaMensagemErro'] = "<img src='img/notification/imgErro.png' class='mensagemErro'><div id='boxAlerta'><h1>ERRO</h1><span>Não foi possível desativar a transportadora</span></div>";
					
				}
			} else {
				echo "<script>alert('ENTROU AQUI AGORA');</script>";
				$statusTransportadora = 1;
				echo "<script>alert('$statusTransportadora');</script>";
				if($objTr->queryUpdateStatus($_GET['idTransportadora'],$statusTransportadora) == 'ok') {
					$_SESSION['alertaMensagem'] = "<img src='img/notification/imgCheck.png' class='mensagemErro'><div id='boxAlerta'><h1>TUDO CERTO</h1><span>Transportadora desativada com sucesso</span></div>";
				} else {
					$_SESSION['alertaMensagemErro'] = "<img src='img/notification/imgErro.png' class='mensagemErro'><div id='boxAlerta'><h1>ERRO</h1><span>Não foi possível desativar a transportadora</span></div>";
					
				}
			}

		}
		//ALTERAR STATUS DA CATEGORIA
}
?>