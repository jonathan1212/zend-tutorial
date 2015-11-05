<?php

namespace Application\Entity;

/**
 * @Entity
 */
class InsecureEntity
{
    /** @Id @Column(type="integer") @GeneratedValue */
    public $id;
    /** @Column */
    public $email;
    /** @Column(type="boolean") */
    public $isAdmin;


    public function fromArray(array $userInput)
    {
        foreach ($userInput as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

}