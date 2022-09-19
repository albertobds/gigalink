<?php 
    require_once 'classes/transportadora.class.php';

    $objFc = new funcoes();
    $objTr = new transportadora();

    $transportadora = $objTr->querySeleciona($_GET['idTransportadora']);

    $idTransportadora = $transportadora['idTransportadora'];
    $nomeTransportadora = $transportadora['nomeTransportadora'];
    $statusTransportadora = $transportadora['statusTransportadora'];


?>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
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
                                <li><a href="#">Transportadora</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Editar transportadora</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Editar transportadora <? echo $nomeTransportadora; ?></a></li>
                        <!--<li><a href="#reviews"> Account Information</a></li>
                        <li><a href="#INFORMATION">Social Information</a></li>-->
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form method="post" action="index.php?m=transportadora&p=validarTransportadora.php&a=editar" id="add-department" class="add-department">
                                            <input type="hidden" name="idTransportadora" value="<?=$objFc->base64($idTransportadora, 1)?>">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <input name="nomeTransportadora" value="<?php echo $nomeTransportadora; ?>" type="text" class="form-control" placeholder="Nome da transportadora" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="statusTransportadora" class="form-control">
                                                            <option value="none" disabled="">Selecione o status</option>
                                                            <option <?php if($statusTransportadora == "1"){ ?>selected=""<?php } ?> value="1">Ativado</option>
                                                            <option <?php if($statusTransportadora == "0"){ ?>selected=""<?php } ?> value="0">Desativado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <button type="submit" class="btn btn-primary waves-effect">Editar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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