<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class secondTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public $collection;

    public function setUp(){

    	$this->collection = new \App\Http\Controllers\TestController;

    }


  public function testAll(){

  	$this->assertEmpty($this->collection->get());

  }

  public function testcounting(){

  	$this->collection = new \App\Http\Controllers\TestController(['one','two','three']);

  	$this->assertEquals(3,$this->collection->count());
  }

   public function testccounting(){

  	$this->collection = new \App\Http\Controllers\TestController(['one','two','three','four']);

  	$this->assertCount(4,$this->collection->get());
  	$this->assertEquals($this->collection->get()[0], 'one');
  }

  public function testinstance(){

  	$collection = new \App\Http\Controllers\TestController();

  	$this->assertInstanceOf('IteratorAggregate', $collection);
  }

  public function test_collecction_can_be_iterated(){

  	$collection = new \App\Http\Controllers\TestController([
  		'one','two','three','four'
  		]);

  	$items = [];

  	foreach ($collection as $item){

  		$items[] = $item;
  	}

  	$this->assertCount(4,$items);
  	$this->assertInstanceOf('ArrayIterator', $collection->getIterator());
  }

  public function test_collection_can_be_merged(){

  	$collection = new \App\Http\Controllers\TestController([
  		'one','two','three'
  		]);
  	$collection2 = new \App\Http\Controllers\TestController([
  		'four','five','six','seven'
  		]);

  	$collection->merge($collection2);

  	$this->assertCount(7,$collection);


  }

  public function test_add_works(){

  	$collection = new \App\Http\Controllers\TestController([
  		'one','two','three'
  		]);
  	$collection->add([
  		'four','five','six','seven'
  		]);

  	$this->assertCount(7,$collection);
  	$this->assertEquals(7,$collection->count());

  }

  public function test_returns_json_encoded_object(){

  	$collection = new \App\Http\Controllers\TestController([
  		['username'=>'Kola'],
  		['username'=>'Kachi'],
  		]);
    
    $this->assertInternalType('int',12);
  	$this->assertEquals('[{"username":"Kola"},{"username":"Kachi"}]',$collection->toJson());
  }

  public function test_json_encoded_object(){

  	$collection = new \App\Http\Controllers\TestController([
  		['username'=>'Kola'],
  		['username'=>'Kachi'],
  		]);

  	$encoded = json_encode($collection);
    
    $this->assertInternalType('int',12);
  	$this->assertEquals('[{"username":"Kola"},{"username":"Kachi"}]',$encoded);
  }


}
