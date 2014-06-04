<?php
namespace ZF2CollectionForm\Form;

use ZF2CollectionForm\Entity\Entity3;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Entity3Fieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('entity3');
        $this->setHydrator(new ClassMethodsHydrator(false))->setObject(new Entity3());
        
        $this->setLabel('Entity 3 : 1');
        
        $this->add(array(
            'name' => 'elementName3',
            'options' => array(
                'label' => 'Element Name 3',
                'label_attributes' => array(
                    'class' => 'form-label required'
                )
            ),
            'attributes' => array(
                'class' => 'element3 required',
                "data-rule-required" => true,
                "data-msg-required" => 'Element Name 3 required.',
                "data-rule-maxlength" => "50",
                "data-msg-maxlength" => 'Element Name 3 can be 50 characters long.'
            )
        ));
        
        $this->add(array(
            'name' => 'removeElement3',
            'attributes' => array(
                'type' => 'button',
                'value' => 'Remove Element 3',
                'class' => 'element3 removeElement3 removeButton',
                'onclick' => "return removeElement3(this)"
            )
        ));
    }

    /**
     *
     * @return array \
     */
    public function getInputFilterSpecification()
    {
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
        $maxLength = \Zend\Validator\StringLength::TOO_LONG;
        
        return array(
            'elementName3' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                $isEmpty => 'Element Name 3 required.'
                            )
                        ),
                        'break_chain_on_failure' => true
                    ),
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'max' => 50,
                            'messages' => array(
                                $maxLength => 'Element Name 3 can be 50 characters long.'
                            )
                        ),
                        'break_chain_on_failure' => true
                    )
                )
            )
        );
    }
}