<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Matheus Piciolli
 * Date: 10/10/2016
 * Time: 21:52
 */
    class Experiencias extends HelperDataBase
    {
        public function CreateExperiencias($Data)
        {
            return parent::Create("experiencias", $Data); // TODO: Change the autogenerated stub
        }

        public function ReadExperiencias($Condition)
        {
            return parent::Read("experiencias", $Condition); // TODO: Change the autogenerated stub
        }

        public function UpdateExperiencias($Field, $NewValue, $Id)
        {
            return parent::Update("experiencias", $Field, $NewValue, $Id); // TODO: Change the autogenerated stub
        }

        public function DeleteExperiencias($Condition)
        {
            return parent::Delete("experiencias", $Condition); // TODO: Change the autogenerated stub
        }
    }
?>