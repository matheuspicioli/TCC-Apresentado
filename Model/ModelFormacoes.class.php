<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Matheus Piciolli
 * Date: 10/10/2016
 * Time: 21:51
 */
    class Formacoes extends HelperDataBase
    {
        private $idFormacao;
        private $anoConclusao;
        private $curso;
        private $instituicao;
        private $codAluno;

        public function CreateFormacoes($Data)
        {
            return parent::Create("formacoes", $Data); // TODO: Change the autogenerated stub
        }

        public function ReadFormacoes($Condition)
        {
            return parent::Read("formacoes", $Condition); // TODO: Change the autogenerated stub
        }

        public function UpdateFormacoes($Field, $NewValue, $Id)
        {
            return parent::Update("formacoes", $Field, $NewValue, $Id); // TODO: Change the autogenerated stub
        }

        public function DeleteFormacoes( $Condition)
        {
            return parent::Delete("formacoes", $Condition); // TODO: Change the autogenerated stub
        }

        /**
         * @return mixed
         */
        public function getIdFormacao()
        {
            return $this->idFormacao;
        }

        /**
         * @param mixed $idFormacao
         */
        public function setIdFormacao($idFormacao)
        {
            $this->idFormacao = $idFormacao;
        }

        /**
         * @return mixed
         */
        public function getAnoConclusao()
        {
            return $this->anoConclusao;
        }

        /**
         * @param mixed $anoConclusao
         */
        public function setAnoConclusao($anoConclusao)
        {
            $this->anoConclusao = $anoConclusao;
        }

        /**
         * @return mixed
         */
        public function getCurso()
        {
            return $this->curso;
        }

        /**
         * @param mixed $curso
         */
        public function setCurso($curso)
        {
            $this->curso = $curso;
        }

        /**
         * @return mixed
         */
        public function getInstituicao()
        {
            return $this->instituicao;
        }

        /**
         * @param mixed $instituicao
         */
        public function setInstituicao($instituicao)
        {
            $this->instituicao = $instituicao;
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