<?php

namespace Application\Model;

class Customer
{
    private $id;
    private $fName;
    private $lName;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getFName()
    {
        return $this->fName;
    }

    public function setFName($fName)
    {
        $this->fName = $fName;
        return $this;
    }

    public function getLName()
    {
        return $this->lName;
    }

    public function setLName($lName)
    {
        $this->lName = $lName;
        return $this;
    }

    public function getArray()
    {
        $data = [
            'id' => $this->getId(),
            'fName' => $this->getFName(),
            'lName' => $this->getLName(),
        ];

        return $data;
    }

}