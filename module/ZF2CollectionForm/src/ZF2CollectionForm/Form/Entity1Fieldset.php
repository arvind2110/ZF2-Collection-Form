<?php
namespace ZF2CollectionForm\Form;

use ZF2CollectionForm\Entity\Entity1;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Entity1Fieldset extends Fieldset implements InputFilterProviderInterface
{

    public function __construct()
    {
        parent::__construct('Entity1');
        $this->setHydrator(new ClassMethodsHydrator(false))->setObject(new Entity1());
        
        $this->add(array(
            'name' => 'elementName1',
            'options' => array(
                'label' => 'Element Name 1',
                'label_attributes' => array(
                    'class' => 'form-label required'
                )
            ),
            'attributes' => array(
                'class' => 'element1 required',
                "data-rule-required" => true,
                "data-msg-required" => 'Element Name 1 required.',
                "data-rule-maxlength" => "50",
                "data-msg-maxlength" => 'Element Name 1 can be 50 characters long.',
                "data-rule-email" => true,
                "data-msg-email" => 'Element Name 1 must be a valid email.'
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'elements2',
            'options' => array(
                'label' => '',
                'count' => 1,
                'should_create_template' => true,
                'template_placeholder' => '__element2Index__',
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'ZF2CollectionForm\Form\Entity2Fieldset'
                )
            )
        ));
        
        $this->add(array(
            'name' => 'addElement2',
            'attributes' => array(
                'type' => 'button',
                'value' => 'Add New Element 2',
                'onclick' => "return addElement2(this)"
            )
        ));
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array \
     */
    public function getInputFilterSpecification()
    {
        $isEmpty = \Zend\Validator\NotEmpty::IS_EMPTY;
        $maxLength = \Zend\Validator\StringLength::TOO_LONG;
        $invalidEmail = \Zend\Validator\EmailAddress::INVALID;
        
        return array(
            'elementName1' => array(
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
                                $isEmpty => 'Element Name 1 required.'
                            )
                        ),
                        'break_chain_on_failure' => true
                    ),
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'max' => 50,
                            'messages' => array(
                                $maxLength => 'Element Name 1 can be 50 characters long.'
                            )
                        ),
                        'break_chain_on_failure' => true
                    ),
                    array(
                        'name' => 'EmailAddress',
                        'options' => array(
                            'messages' => array(
                                $invalidEmail => 'Element Name 1 must be a valid email.'
                            )
                        )
                    )
                )
            )
        );
    }
}