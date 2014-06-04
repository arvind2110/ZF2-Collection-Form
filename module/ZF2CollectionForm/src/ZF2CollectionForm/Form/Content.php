<?php
namespace ZF2CollectionForm\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Content extends Form
{
    public function __construct()
    {
        parent::__construct('Content');

        $this->setAttribute('method', 'post')
        ->setHydrator(new ClassMethodsHydrator(false))
        ->setInputFilter(new InputFilter());

        $this->add(array(
            'type' => 'ZF2CollectionForm\Form\Entity1Fieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf'
        ));

        $this->add(array(
            'name' => 'save',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Send'
            )
        ));
    }
}