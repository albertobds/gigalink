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
                                            <li><a href="#">Transportadoras</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Adicionar transportadora</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Adicionar transportadora</a></li>
                                <!--<li><a href="#reviews"> Account Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li>-->
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form method="post" action="index.php?m=transportadora&p=validarTransportadora.php&a=cadastrar" id="add-department" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="nomeTransportadora" type="text" class="form-control" placeholder="Nome da transportadora" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="statusTransportadora" class="form-control">
																	<option value="none" selected="" disabled="">Selecione o status</option>
																	<option value="1">Ativado</option>
																	<option value="0">Desativado</option>
																</select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit" class="btn btn-primary waves-effect">Cadastrar</button>
																<button type="reset" class="btn btn-danger waves-effect">Apagar</button>
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