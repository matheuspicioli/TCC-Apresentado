<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Matheus Piciolli
 * Date: 10/10/2016
 * Time: 21:53
*/
    class Enderecos extends HelperDataBase
    {
        private $idEndereco;
        private $numero;
        private $rua;
        private $bairro;
        private $cidade;
        private $estado;
        private $cep;
        private $complemento;
        private $codAluno;

        public function CreateEnderecos($Data)
        {
            return parent::Create("enderecos", $Data); // TODO: Change the autogenerated stub
        }

        public function ReadEnderecos($Condition)
        {
            return parent::Read("enderecos", $Condition); // TODO: Change the autogenerated stub
        }

        public function UpdateEnderecos($Field, $NewValue, $Id)
        {
            return parent::Update("enderecos", $Field, $NewValue, $Id); // TODO: Change the autogenerated stub
        }

        public function DeleteEnderecos($Condition)
        {
            return parent::Delete("enderecos", $Condition); // TODO: Change the autogenerated stub
        }

        /**
         * @return mixed
         */
        public function getIdEndereco()
        {
            return $this->idEndereco;
        }

        /**
         * @param mixed $idEndereco
         */
        public function setIdEndereco($idEndereco)
        {
            $this->idEndereco = $idEndereco;
        }

        /**
         * @return mixed
         */
        public function getNumero()
        {
            return $this->numero;
        }

        /**
         * @param mixed $numero
         */
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }

        /**
         * @return mixed
         */
        public function getRua()
        {
            return $this->rua;
        }

        /**
         * @param mixed $rua
         */
        public function setRua($rua)
        {
            $this->rua = $rua;
        }

        /**
         * @return mixed
         */
        public function getBairro()
        {
            return $this->bairro;
        }

        /**
         * @param mixed $bairro
         */
        public function setBairro($bairro)
        {
            $this->bairro = $bairro;
        }

        /**
         * @return mixed
         */
        public function getCidade()
        {
            return $this->cidade;
        }

        /**
         * @param mixed $cidade
         */
        public function setCidade($cidade)
        {
            $this->cidade = $cidade;
        }

        /**
         * @return mixed
         */
        public function getEstado()
        {
            return $this->estado;
        }

        /**
         * @param mixed $estado
         */
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }

        /**
         * @return mixed
         */
        public function getCep()
        {
            return $this->cep;
        }

        /**
         * @param mixed $cep
         */
        public function setCep($cep)
        {
            $this->cep = $cep;
        }

        /**
         * @return mixed
         */
        public function getComplemento()
        {
            return $this->complemento;
        }

        /**
         * @param mixed $complemento
         */
        public function setComplemento($complemento)
        {
            $this->complemento = $complemento;
        }

        /**
         * @return mixed
         */
        public function getCodAluno()
        {
            return $this->codAluno;
        }

        /**
         * @param mixed $codAluno
         */
        public function setCodAluno($codAluno)
        {
            $this->codAluno = $codAluno;
        }

    }
?>