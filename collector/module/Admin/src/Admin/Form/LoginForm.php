<?php 
namespace Admin\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class LoginForm  extends Form implements  InputFilterAwareInterface{

    protected  $inputFilter;

    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('login');

        $this->add(array(
            'name' => 'email',
            'type' => 'Email',
            'options' => array(
                'label' => 'Email ',
            ),
            'attributes' => array(
                'class' => 'labelclass',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password ',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Log in',
                'id' => 'submitbutton',
            ),
        ));
    }
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name' => 'email',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 500,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name' => 'password',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 500,
                        ),
                    ),
                ),
            ));
        $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
} 