<?php
    require_once 'classes/transportadora.class.php';

    $objFc = new funcoes();
	$objTr = new transportadora();
?>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Transportadoras</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Listar transportadoras</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Lista de transportadoras</h4>
                    <div class="add-product">
                        <a href="index.php?m=transportadora&p=adicionarTransportadora.php">Adicionar transportadora</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>

                            <?php foreach($objTr->querySelect() as $rst ) { 

                                $idTransportadora = $rst['idTransportadora'];
                                $nomeTransportadora = $rst['nomeTransportadora'];
                                $statusTransportadora = $rst['statusTransportadora'];
                                
                                if($statusTransportadora == "1"){
                                    $statusTransportadora = "Ativado";
                                    $iconeStatus = "<a href='index.php?idTransportadora=".$objFc->base64($idTransportadora, 1)."&a=status&m=transportadora&p=validarTransportadora.php' onclick='return confirm(\"Desativar a transportadora $nomeTransportadora?\")' title='Desativar'><button class='pd-setting'>".$statusTransportadora."</button></a>";
                                } else{
                                    $statusTransportadora = "Desativado";
                                    $iconeStatus = "<a href='index.php?idTransportadora=".$objFc->base64($idTransportadora, 1)."&a=status&m=transportadora&p=validarTransportadora.php' onclick='return confirm(\"Ativar a transportadora $nomeTransportadora?\")' title='Ativar'><button class='ds-setting'>".$statusTransportadora."</button></a>";
                                }

                            ?>

                                    
                                <tr>
                                    <td><?=$idTransportadora?></td>
                                    <td><?=$nomeTransportadora?></td>
                                    <td>
                                        <?=$iconeStatus?>
                                    </td>
                                    <td>
                                        <a href="index.php?idTransportadora=<?=$objFc->base64($idTransportadora, 1)?>&m=transportadora&p=editarTransportadora.php" onclick="return confirm('Editar o cadastro da transportadora <?=$nomeTransportadora?>?')" title="Editar"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        
                                        <a href="index.php?idTransportadora=<?=$objFc->base64($idTransportadora, 1)?>&a=excluir&m=transportadora&p=validarTransportadora.php" onclick="return confirm('Apagar o cadastro da transportadora <?=$nomeTransportadora?>?')" title="Excluir"><button data-toggle="tooltip" title="Excluir" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>


                            <?php } ?>	

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    if (isset($_SESSION['alertaMensagem'])){
        echo "<div id='alertaMensagem'>";
            echo $_SESSION['alertaMensagem'];
            unset($_SESSION['alertaMensagem']);
        echo "</div>";
    }
    if (isset($_SESSION['alertaMensagemErro'])){
        echo "<div id='alertaMensagemErro'>";
            echo $_SESSION['alertaMensagemErro'];
            unset($_SESSION['alertaMensagemErro']);
        echo "</div>";
    }
?>