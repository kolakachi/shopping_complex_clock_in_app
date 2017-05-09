<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    private $first_name;//first name

    private $last_name;//last name

    private $full_name;//full name

     private $email;//email name

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
    *
    *set first name for our unit test
    *
    */
    public function setFirstName($firstName){

        $this->first_name=$firstName;
    }
    
    /**
    *
    *get first name for our unit test
    *
    */
    public function getFirstName(){

        return $this->first_name;
    }


    /**
    *
    *set first name for our unit test
    *
    */
    public function setLastName($LastName){

        $this->last_name=$LastName;
    }
    
    /**
    *
    *get first name for our unit test
    *
    */
    public function getLastName(){

        return $this->last_name;
    }

   /**
    *
    *get full name for our unit test
    *
    */
    public function getFullName(){

        $this->full_name= $this->getFirstName().' '.$this->getLastName();

        return $this->full_name;
    }

   /**
    *
    *set first name for our unit test
    *
    */
    public function setEmail($email){

        $this->email=$email;
    }
    
   /**
    *
    *get first name for our unit test
    *
    */
    public function getEmail(){

        return $this->email;
    }

    /**
    *
    *get variables for our unit test
    *
    */
    public function getVariables(){

    

        return ['first_name'=>$this->getFirstName(),'last_name'=>$this->getLastName(),'email'=>$this->getEmail()];
    }

}
