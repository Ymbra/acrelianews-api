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
            'id' => $listId,
        ];
        $params = [
            'email_address' => $email,
            'email_format' => $emailFormat,
            'custom_fields' => $customFields,
        ];

        return $this->request('POST', '/lists/{id}/contacts', $tokens, $params);
    }

    /**
     * Edits contact.
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Post_Lists_Contacts_Edit
     * @param string[] $options
     */
    public function edit(int $listId, string $email, int $subscribe, int $emailFormat = 2, array $customFields = []): string
    {
        $tokens = [
            'id' => $listId,
            'email' => $email,
        ];
        $params = [
            'subscribe ' => $subscribe,
            'email_format' => $emailFormat,
            'custom_fields' => $customFields,
        ];

        return $this->request('POST', '/lists/{id}/contacts/{email}', $tokens, $params);
    }

    /**
     * Gets contact from list by email.
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Get_List_Contacts_Email
     */
    public function getByEmail(int $listId, string $email, bool $customFields = TRUE): string
    {
        $tokens = [
            'id' => $listId,
            'email' => $email,
        ];

        return $this->request('GET', '/lists/{id}/contacts/{email}', $tokens, ['custom_fields' => $customFields]);
    }

    /**
     * Gets contact from list by ID.
     * @see http://manager.acrelianews.com/api/v2/apidoc/#api-Contactos-Get_List_Contacts_Id
     */
    public function getById(int $listId, int $contactId, bool $customFields = TRUE): string
    {
        $tokens = [
            'id' => $listId,
            'contact_id' => $contactId,
        ];

        return $this->request('GET', '/lists/{id}/contacts/{contact_id}', $tokens, ['custom_fields' => $customFields]);
    }
}
