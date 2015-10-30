<?php
namespace App\Filter;
use App\Filter\AbstractFilter;
use Zend\InputFilter;
use Zend\Filter\File\RenameUpload;
use Zend\Validator\File\Size;
use Zend\Validator\File\Extension;
use Zend\Validator\File\MimeType;

class AuthFilter extends AbstractFilter{
	
	
	
	public function setForgotPasswordFilter(){
		
		$this->createInput(array(
            'name' => 'username',
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
                        'max' => 100,
                    ),
                ),
                array(
                    'name' => 'EmailAddress',
                ),
            ),
        ));
	
	
	
		$this->inputFilter = $this->getFilter();
	}
}