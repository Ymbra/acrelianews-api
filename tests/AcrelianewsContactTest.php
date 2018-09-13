<?php

namespace Ymbra\Acrelianews\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Contact test.
 *
 * @package Ymbra\Acrelianews\Tests
 */
class AcrelianewsContactTest extends TestCase
{
    public function testAddContact()
    {
        $listId = '1244';
        $email = 'test@example.com';

        $contact = new AcrelianewsContact();
        $response = $contact->add($listId, $email);

        $this->assertEquals(
            'POST',
            $contact->getClient()->method
        );
        $this->assertEquals(
            $contact->getEndpoint() . '/lists/' . $listId . '/contacts',
            $contact->getClient()->uri
        );
        $this->assertEquals(
            $email,
            $response->email_address
        );
    }

    public function testGetContactByEmail()
    {
        $listId = '1244';
        $email = 'test@example.com';

        $contact = new AcrelianewsContact();
        $contact->getByEmail($listId, $email);

        $this->assertEquals(
            'GET',
            $contact->getClient()->method
        );
        $this->assertEquals(
            $contact->getEndpoint() . '/lists/' . $listId . '/contacts/' . $email,
            $contact->getClient()->uri
        );
    }

    public function testGetContactById()
    {
        $listId = '1244';
        $contactId = '123456';

        $contact = new AcrelianewsContact();
        $contact->getById($listId, $contactId);

        $this->assertEquals(
            'GET',
            $contact->getClient()->method
        );
        $this->assertEquals(
            $contact->getEndpoint() . '/lists/' . $listId . '/contacts/' . $contactId,
            $contact->getClient()->uri
        );
    }
}
