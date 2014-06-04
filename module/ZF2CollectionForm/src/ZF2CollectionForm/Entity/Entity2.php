<?php
namespace ZF2CollectionForm\Entity;

class Entity2
{

    /**
     *
     * @var string \
     */
    protected $elementName2;

    /**
     *
     * @var array \
     */
    protected $elements3;

    /**
     *
     * @param string $elementName2            
     * @return Element Name 2
     *         \
     */
    public function setElementName2($elementName2)
    {
        $this->elementName2 = $elementName2;
        return $this;
    }

    /**
     *
     * @return string \
     */
    public function getElementName2()
    {
        return $this->elementName2;
    }

    /**
     *
     * @param array $elements3            
     * @return elements 3
     *         \
     */
    public function setElements3(array $elements3)
    {
        $this->elements3 = $elements3;
        return $this;
    }

    /**
     *
     * @return array \
     */
    public function getElements3()
    {
        return $this->elements3;
    }
}