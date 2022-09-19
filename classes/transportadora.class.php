<?php

    require_once 'conexao.class.php';
    require_once 'funcoes.class.php'; 

    class transportadora {

        private $con;
        private $objfunc;

        private $idTransportadora;
        private $nomeTransportadora;
        private $statusTransportadora;

        public function __construct() {
            $this->con = new conexao();
            $this->objfunc = new funcoes();
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function querySeleciona($dado) {
            try {
                $this->idTransportadora = $this->objfunc->base64($dado, 2);

                $cst = $this->con->conectar()->prepare("SELECT * FROM transportadora WHERE idTransportadora = :idTransp;");
                $cst->bindParam(":idTransp", $this->idTransportadora, PDO::PARAM_INT);
                $cst->execute();
                return $cst->fetch();
            } catch(PDOException $ex) {
                echo $ex->getMessage();
                return 'error ';$ex->getMessage();
            }
        }

        public function querySelect() {
            try {
                $cst = $this->con->conectar()->prepare("SELECT * FROM transportadora;");
                $cst->execute();
                return $cst->fetchAll();
            } catch(PDOException $ex) {
                echo $ex->getMessage();
                return 'error ';$ex->getMessage();
            }
        }

        public function queryInsert($dados) {
            try {
                $this->nomeTransportadora = $this->objfunc->tratarCaracter($dados['nomeTransportadora'], 1);
                $this->statusTransportadora = $dados['statusTransportadora'];

                $cst = $this->con->conectar()->prepare("INSERT INTO transportadora (nomeTransportadora, statusTransportadora) VALUES (:nomeTransportadora, :statusTransportadora);");
                $cst->bindParam(":nomeTransportadora", $this->nomeTransportadora, PDO::PARAM_STR);
                $cst->bindParam(":statusTransportadora", $this->statusTransportadora, PDO::PARAM_BOOL);

                if($cst->execute()) {
                    return 'ok';
                } else {
                    return 'erro';
                }
            } catch(PDOException $ex) {
                echo $ex->getMessage();
                return 'error ';$ex->getMessage();    
            }
        }

        public function queryUpdate($dados) {
            try {
                $this->idTransportadora = $this->objfunc->base64($dados['idTransportadora'], 2);
                $this->nomeTransportadora = $this->objfunc->tratarCaracter($dados['nomeTransportadora'], 1);
                $this->statusTransportadora = $dados['statusTransportadora'];

                $cst = $this->con->conectar()->prepare("UPDATE transportadora SET 'nomeTransportadora' = :nomeTransportadora, 'statusTransportadora'= :statusTransportadora' WHERE idTansportadora = :idTransp;");
                $cst->bindParam(":idTransp", $this->idTransportadora, PDO::PARAM_INT);
                $cst->bindParam(":nomeTransportadora", $this->nomeTransportadora, PDO::PARAM_STR);
                $cst->bindParam(":statusTransportadora", $this->statusTransportadora, PDO::PARAM_INT);

                if($cst->execute()) {
                    return 'ok';
                } else {
                    return 'erro';
                }
            } catch(PDOException $ex) {
                echo $ex->getMessage();
                return 'error ';$ex->getMessage();
            }
        }

        public function queryUpdateStatus($dados, $status) {
            try {
                $this->idTransportadora = $this->objfunc->base64($dados, 2);
                $this->statusTransportadora = $status;

                $cst = $this->con->conectar()->prepare("UPDATE transportadora SET statusTransportadora = :statusTransportadora WHERE idTransportadora = :idTransp;");
                $cst->bindParam(":idTransp", $this->idTransportadora, PDO::PARAM_INT);
                $cst->bindParam(":statusTransportadora", $this->$statusTransportadora, PDO::PARAM_BOOL);

                if($cst->execute()) {
                    return 'ok';
                } else {
                    return 'erro';
                }
            } catch(PDOException $ex) {
                echo $ex->getMessage();
                return 'error ';$ex->getMessage();
            }
        }

        public function queryDelete($dado) {
            try{
                $this->idTransportadora = $this->objfunc->base64($dado, 2);

                $cst = $this->con->conectar()->prepare("DELETE FROM transportadora WHERE idTansportadora = :idTransp;");
                $cst->bindParam(":idTransp", $this->idTransportadora, PDO::PARAM_INT);

                if($cst->execute()) {
                    return 'ok';
                } else {
                    return 'erro';
                }
            } catch(PDOException $ex) {
                echo $ex->getMessage();
                return 'error ';$ex->getMessage();
            }
        }

    }

?>