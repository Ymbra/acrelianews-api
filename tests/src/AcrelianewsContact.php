<?php

namespace Ymbra\Acrelianews\Tests;

/**
 * Acrelianews contact.
 *
 * @package Ymbra\Acrelianews\Tests
 */
class AcrelianewsContact extends \Ymbra\Acrelianews\AcrelianewsContact
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @inheritdoc
     */
    public function add($listId, $email, $emailFormat = 2, $customFields = [])
    {
        parent::add($listId, $email);

        $response = (object) [
            'contact_id' => $contactId,
            'list_id' => $listId,
            'email_address' => 'test@example.com',
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getByEmail($listId, $email)
    {
        parent::getByEmail($listId, $email);

        $response = (object) [
            'contact_id' => $contactId,
            'list_id' => $listId,
            'email_address' => 'test@example.com',
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getById($listId, $contactId)
    {
        parent::getById($listId, $contactId);

        $response = (object) [
            'contact_id' => $contactId,
            'list_id' => $listId,
            'email_address' => 'test@example.com',
        ];

        return $response;
    }
}
