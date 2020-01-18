<?php

    class CarroModel extends AppModel
    {
        protected $plateNumber;
        protected $name;
        protected $color;
        protected $status;
        public $tableName = 'cars';

        public function setCampos($plate, $name, $color, $status)
        {
            $this->plateNumber = $plate;
            $this->name = $name;
            $this->color = $color;
            $this->status = $status;
        }

        public function getPlateNumber()
        {
            return $this->plateNumber;
        }

        public function getCarName()
        {
            return $this->name;
        }

        public function getColor()
        {
            return $this->color;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function isEmpty()
        {
            if(empty($this->plateNumber)) return true;
            if(empty($this->name)) return true;
            if(empty($this->color)) return true;
            if(empty($this->status)) return true;
            return false;
        }
    }

?>