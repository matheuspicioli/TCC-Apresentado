<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:28
 */
    class Mensagens
    {
        private $idMensagem;
        private $titulo;
        private $de;
        private $data;
        private $mensagem;
        private $codUsuario;

        /**
         * @return mixed
         */
        public function getIdMensagem()
        {
            return $this->idMensagem;
        }

        /**
         * @param mixed $idMensagem
         */
        public function setIdMensagem($idMensagem)
        {
            $this->idMensagem = $idMensagem;
        }

        /**
         * @return mixed
         */
        public function getTitulo()
        {
            return $this->titulo;
        }

        /**
         * @param mixed $titulo
         */
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }

        /**
         * @return mixed
         */
        public function getDe()
        {
            return $this->de;
        }

        /**
         * @param mixed $de
         */
        public function setDe($de)
        {
            $this->de = $de;
        }

        /**
         * @return mixed
         */
        public function getData()
        {
            return $this->data;
        }

        /**
         * @param mixed $data
         */
        public function setData($data)
        {
            $this->data = $data;
        }

        /**
         * @return mixed
         */
        public function getMensagem()
        {
            return $this->mensagem;
        }

        /**
         * @param mixed $mensagem
         */
        public function setMensagem($mensagem)
        {
            $this->mensagem = $mensagem;
        }

        /**
         * @return mixed
         */
        public function getCodUsuario()
        {
            return $this->codUsuario;
        }

        /**
         * @param mixed $codUsuario
         */
        public function setCodUsuario($codUsuario)
        {
            $this->codUsuario = $codUsuario;
        }


    }

?>