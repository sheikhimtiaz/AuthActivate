<?php
/**
 * Created by PhpStorm.
 * User: Lopa11235
 * Date: 8/1/2015
 * Time: 8:33 PM
 */

namespace User\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class SignupForm extends Form implements  InputFilterAwareInterface{
    protected  $inputFilter;

    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('signup');
        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Name ',
            ),
            'attributes' => array(
                'class' => 'labelclass',
            ),
        ));
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
            'name' => 'phoneNo',
            'type' => 'Text',
            'options' => array(
                'label' => 'Phone number ',
            ),
            'attributes' => array(
                'class' => 'labelclass',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'confirmpassword',
            'type' => 'Password',
            'options' => array(
                'label' => 'Confirm Password',
            ),
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\File',
            'required' => false,
            'name' => 'profileImg',
            'options' => array(
                'label' => 'Profile Image',
            ),
            'attributes' => array(
                'id' => 'profile_img',
            ),
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\File\Extension',
                    'options' => array(
                        'extension' => 'gif,jpg,jpeg,png',
                    ),
                ),
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
                'name' => 'profileImg',
                'required' => false,
            ));
            $inputFilter->add(array(
                'name'     => 'phoneNo',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 500,
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'name',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 0,
                            'max'      => 500,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 500,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'password',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 4,
                            'max'      => 500,
                        ),
                    ),
                ),
            ));
            $inputFilter->add(array(
                'name'     => 'confirmpassword',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'password',
                        ),
                    ),
                ),
            ));
            $this->inputFilter= $inputFilter;
        }
        return $this->inputFilter;
    }
}