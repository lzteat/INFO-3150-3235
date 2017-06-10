<?php

namespace Application\Model;

class Expense
{
    private $eId;
    private $cId;
    private $name;
    private $price;
    private $date;

    public function getCId()
    {
        return $this->cId;
    }

    public function setCId($cId)
    {
        $this->cId = $cId;
        return $this;
    }

    public function getEId()
    {
        return $this->eId;
    }

    public function setEId($eId)
    {
        $this->eId = $eId;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getArray()
    {
        $data = [
            'cId' => $this->getCId(),
            'eId' => $this->getEId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'date' => $this->getDate(),
        ];

        return $data;
    }

}