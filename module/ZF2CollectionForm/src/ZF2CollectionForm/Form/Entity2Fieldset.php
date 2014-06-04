<?php
namespace ZF2CollectionForm\Form;

use ZF2CollectionForm\Entity\Entity2;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Entity2Fieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('entity2');
        $this->setHydrator(new ClassMethodsHydrator(false))->setObject(new Entity2());
        
        $this->setLabel('Entity 2 : 1');
        
        $this->add(array(
            'name' => 'elementName2',
            'options' => array(
                'label' => 'Element Name 2',
                'label_attributes' => array(
                    'class' => 'form-label required'
                )
            ),
            'attributes' => array(
                'class' => 'element2',
                "data-rule-required" => true,
                "data-msg-required" => 'Element Name 2 required.',
                "data-rule-maxlength" => "50",
                "data-msg-maxlength" => 'Element Name 2 can be 50 characters long.'
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'elements3',
            'options' => array(
                'label' => '',
                'count' => 1,
                'should_create_template' => true,
                'template_placeholder' => '__element3Index__',
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'ZF2CollectionForm\Form\Entity3Fieldset'
                )
            )
        ));
        
        $this->add(array(
            'name' => 'addElement3',
            'attributes' => array(
                'type' => 'button',
                'value' => 'Add Element 3',
                'onclick' => "return addElement3(this)"
            )
        ));
        
        $this->add(array(
            'name' => 'removeElement2',
            'attributes' => array(
                'type' => 'button',
                'value' => 'Remove Element 2',
                'class' => 'element2 removeElement2 removeButton',
                'onclick' => "return removeElement2(this)"
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
            'elementName2' => array(
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
                                $isEmpty => 'Element Name 2 required.'
                            )
                        ),
                        'break_chain_on_failure' => true
                    ),
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'max' => 50,
                            'messages' => array(
                                $maxLength => 'Element Name 2 can be 50 characters long.'
                            )
                        ),
                        'break_chain_on_failure' => true
                    )
                )
            )
        );
    }
}