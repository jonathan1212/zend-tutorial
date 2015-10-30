<?php
namespace Application\Form\Auth;

use Zend\Form\Form;
use Zend\InputFilter;
class ForgotPasswordForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'username',
            'type' => 'Email',
        		'attributes' => array(
        				'id'=>'inputEmail3',
        				'class' => 'form-control',
        				'placeholder' => 'enter valid email address',
        		),
        ));

         $this->add(array(
            'name' => 'Loginsubmit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Send',
                'id' => 'Loginsubmit',
            	'class'=>'btn btn-info pull-right',
            ),
        ));
       
    }

}
