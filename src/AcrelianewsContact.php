<?php

namespace Ymbra\Acrelianews;

/**
 * Acrelianews contact.
 *
 * @package Ymbra\Acrelianews
 */
class AcrelianewsContact extends Acrelianews
{
    /**
     * Adds new contact.
     *
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Post_Lists_Contacts_Add
     */
    public function add($listId, $email, $emailFormat = 2, $customFields = [])
    {
        $tokens = [
          'list_id' => $listId,
        ];
        $params = [
            'email_address' => $email,
            'email_format' => $emailFormat,
            'custom_fields' => $customFields,
        ];

        return $this->request('POST', '/lists/{list_id}/contacts', $tokens, $params);
    }

    /**
     * Gets contact from list by email.
     *
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Get_List_Contacts_Email
     */
    public function getByEmail($listId, $email)
    {
        $tokens = [
          'list_id' => $listId,
          'email' => $email,
        ];

        return $this->request('GET', '/lists/{list_id}/contacts/{email}', $tokens);
    }

    /**
     * Gets contact from list by ID.
     *
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Get_List_Contacts_Id
     */
    public function getById($listId, $contactId)
    {
        $tokens = [
          'list_id' => $listId,
          'contact_id' => $contactId,
        ];

        return $this->request('GET', '/lists/{list_id}/contacts/{contact_id}', $tokens);
    }
}
