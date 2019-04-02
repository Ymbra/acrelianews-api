<?php declare(strict_types=1);

namespace Ymbra\Acrelianews;

/**
 * Acrelianews contact.
 * @package Ymbra\Acrelianews
 */
class AcrelianewsContact extends Acrelianews
{
    /**
     * Adds new contact.
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Post_Lists_Contacts_Add
     * @param string[] $options
     */
    public function add(int $listId, string $email, int $emailFormat = 2, array $customFields = []): string
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
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Get_List_Contacts_Email
     */
    public function getByEmail(int $listId, string $email): string
    {
        $tokens = [
          'list_id' => $listId,
          'email' => $email,
        ];

        return $this->request('GET', '/lists/{list_id}/contacts/{email}', $tokens);
    }

    /**
     * Gets contact from list by ID.
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Get_List_Contacts_Id
     */
    public function getById(int $listId, int $contactId): string
    {
        $tokens = [
          'list_id' => $listId,
          'contact_id' => $contactId,
        ];

        return $this->request('GET', '/lists/{list_id}/contacts/{contact_id}', $tokens);
    }
}
