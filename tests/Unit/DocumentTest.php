<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

class DocumentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // private $doc;

    public function setUp()
    {
        parent::setUp();
        $this->createNewDocument = new Document();
    }

    public function testHttpPageLoad()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testDocumentExist()
    {
    	$model = $this->createNewDocument->documentExist('hello world');
    	$this->assertEquals($model, 1);
    }

    // public function testNewDocument()
    // {
    	
    // 	$this->assertEquals($data, $response);
    // }
}
