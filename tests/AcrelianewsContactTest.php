<?php

namespace Ymbra\Acrelianews\Tests;

use PHPUnit\Framework\TestCase;
use Ymbra\Acrelianews\AcrelianewsContact;
use Ymbra\Acrelianews\Tests\Http\DummyHttpClient;

/**
 * Contact test.
 *
 * @package Ymbra\Acrelianews\Tests
 */
class AcrelianewsContactTest extends TestCase
{
    public $contact;

    public function setUp()
    {
        $this->contact = new AcrelianewsContact('$$fakeApiKey$$');
        $this->contact->setClient(new DummyHttpClient());
    }

    public function testAddContact()
    {
        $listId = '1244';
        $email = 'test@example.com';

        $this->contact->add($listId, $email);

        $this->assertEquals(
            'POST',
            $this->contact->getClient()->method
        );
        $this->assertEquals(
            $this->contact->getEndpoint() . '/lists/' . $listId . '/contacts',
            $this->contact->getClient()->uri
        );
    }

    public function testEditContact()
    {
        $listId = '1244';
        $email = 'test@example.com';
        $subscribe = 1;
    
        $this->contact->edit($listId, $email, $subscribe);

        $this->assertEquals(
            'POST',
            $this->contact->getClient()->method
        );
        $this->assertEquals(
            $this->contact->getEndpoint() . '/lists/' . $listId . '/contacts/' . $email,
            $this->contact->getClient()->uri
        );
    }

    public function testGetContactByEmail()
    {
        $listId = '1244';
        $email = 'test@example.com';
    
        $this->contact->getByEmail($listId, $email);

        $this->assertEquals(
            'GET',
            $this->contact->getClient()->method
        );
        $this->assertEquals(
            $this->contact->getEndpoint() . '/lists/' . $listId . '/contacts/' . $email,
            $this->contact->getClient()->uri
        );
    }

    public function testGetContactById()
    {
        $listId = '1244';
        $contactId = '123456';

        $this->contact->getById($listId, $contactId);

        $this->assertEquals(
            'GET',
            $this->contact->getClient()->method
        );
        $this->assertEquals(
            $this->contact->getEndpoint() . '/lists/' . $listId . '/contacts/' . $contactId,
            $this->contact->getClient()->uri
        );
    }
}
