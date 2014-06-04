<?php
namespace ZF2CollectionForm\Entity;

class Entity3
{

    /**
     *
     * @var string \
     */
    protected $elementName3;

    /**
     *
     * @param string $elementName3            
     * @return Element Name 3
     *         \
     */
    public function setElementName3($elementName3)
    {
        $this->elementName3 = $elementName3;
        return $this;
    }

    /**
     *
     * @return string \
     */
    public function getElementName3()
    {
        return $this->elementName3;
    }
}