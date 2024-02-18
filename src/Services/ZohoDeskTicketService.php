<?php

namespace Navari\ZohoDesk\Services;

use Navari\ZohoDesk\Entities\Ticket\Contact;
use Navari\ZohoDesk\Entities\Ticket\CreateTicketEntity;
use Navari\ZohoDesk\Entities\Ticket\TicketResponseEntity;
use Navari\ZohoDesk\Exceptions\ZohoDeskBadResponseException;
use Navari\ZohoDesk\Exceptions\ZohoDeskRequestFailedException;

class ZohoDeskTicketService extends BaseService
{
    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getTickets(): array
    {
        $data = $this->sendRequest('GET', 'tickets');

        return array_map(static function ($ticket) {
            return new TicketResponseEntity(
                ...$ticket
            );
        }, $data['data']);
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getTicket(string $ticketId): TicketResponseEntity
    {
        $data = $this->sendRequest('GET', 'tickets/'.$ticketId);

        return new TicketResponseEntity(
            ...$data['data']
        );
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function createTicket(CreateTicketEntity $createTicketEntity): TicketResponseEntity
    {
        $entity = new TicketResponseEntity();
        $entity->subject = $createTicketEntity->subject;
        $entity->email = $createTicketEntity->email;
        $entity->description = $createTicketEntity->message;
        $entity->departmentId = $createTicketEntity->departmentId;

        $contact = new Contact();
        $contact->firstName = $createTicketEntity->firstName;
        $contact->lastName = $createTicketEntity->lastName;
        $contact->email = $createTicketEntity->email;
        $entity->contact = $contact;

        $data = $this->sendRequest('POST', 'tickets', body: $entity->toArray());

        return new TicketResponseEntity(
            ...$data
        );
    }
}
