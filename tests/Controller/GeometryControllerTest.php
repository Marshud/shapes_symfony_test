<?php 

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GeometryControllerTest extends WebTestCase
{
  public function testGetCircleData()
  {
    // Simulate a client
    $client = static::createClient();
    $client->request('GET', 'http://127.0.0.1:8000/circle/2');

    // Asssert a successful response
    $this->assertResponseIsSuccessful();
    $this->assertResponseStatusCodeSame(200);

    // Verify that it's JSON
    $this->assertResponseHeaderSame('content-type', 'application/json');

    // Now we check the response data
    $responseContent = $client->getResponse()->getContent();
    $expectedData = '{"type":"Circle","radius":2.0,"surface":12.566370614359172,"circumference":12.566370614359172}';
    $this->assertJsonStringEqualsJsonString($expectedData, $responseContent);
  }

  public function testTriangleData() 
  {
    // Simulate a client request
    $client = static::createClient();
    $client->request('GET', 'http://127.0.0.1:8000/triangle/3/4/5');

    // Assert a successful response
    $this->assertResponseIsSuccessful();
    $this->assertResponseStatusCodeSame(200);

    // Verify that it's JSON
    $this->assertResponseHeaderSame('content-type', 'application/json');

    // Now we check the response data
    $responseContent = $client->getResponse()->getContent();
    $expectedData = '{"type":"Triangle","a":3.0,"b":4.0,"c":5.0,"surface":6.0,"circumference":12.0}';
    $this->assertJsonStringEqualsJsonString($expectedData, $responseContent);

  }
}