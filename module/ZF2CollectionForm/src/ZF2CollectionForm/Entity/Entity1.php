<?php
namespace ZF2CollectionForm\Entity;

class Entity1
{
    /**
     *
     * @var string \
     */
    protected $elementName1;

    /**
     *
     * @var array \
     */
    protected $elements2;

    /**
     *
     * @param string $elementName2
     * @return Element Name 2
     *         \
     */
    public function setElementName1($elementName1)
    {
        $this->elementName1 = $elementName1;
        return $this;
    }
    
    /**
     *
     * @return string \
     */
    public function getElementName1()
    {
        return $this->elementName1;
    }
    
    /**
     *
     * @param array $elements2
     * @return elements 2
     *         \
     */
    public function setElements2(array $elements2)
    {
        $this->elements2 = $elements2;
        return $this;
    }
    
    /**
     *
     * @return array \
     */
    public function getElements2()
    {
        return $this->elements2;
    }
}