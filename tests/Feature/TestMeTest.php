<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestMeTest extends TestCase
{

	protected $user;

	public function setUp(){

		$this->user = new \App\user;
	} 
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFirstName(){

        
        
        $this->user->setFirstName('Kola');

        $this->assertEquals($this->user->getFirstName(),'Kola');
    }


    public function testLastName(){

        
        
        $this->user->setLastName('Lawal');

        $this->assertEquals($this->user->getLastName(),'Lawal');
    }

    public function testFullName(){

    	
        
        $this->user->setFirstName('Kola');

        $this->user->setLastName('Lawal');

        $this->assertEquals($this->user->getFullName(),'Kola Lawal');


    }

    public function testEmail(){

    	
        
        $this->user->setEmail('KolaKachi@gmail.com');

        $this->assertEquals($this->user->getEmail(),'KolaKachi@gmail.com');


    }

    public function testUserVariables(){

    	
        
        $this->user->setFirstName('Kola');

        $this->user->setLastName('Lawal');

        $this->user->setEmail('KolaKachi@gmail.com');

        $userVariables = $this->user->getvariables();

        $this->assertArrayHaskey('first_name', $userVariables);
        $this->assertArrayHaskey('last_name', $userVariables);

        $this->assertEquals($userVariables['email'],'KolaKachi@gmail.com');
        $this->assertEquals($userVariables['last_name'],'Lawal');


    }
}
