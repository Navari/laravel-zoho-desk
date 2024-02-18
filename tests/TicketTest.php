<?php

use Navari\ZohoDesk\Entities\Ticket\CreateTicketEntity;
use Navari\ZohoDesk\Facades\ZohoDesk;

it('creates ticket', function () {
    $generalDepartmentId = ZohoDesk::getGeneralDepartment()->id;
    $createTicketEntity = new CreateTicketEntity();
    $createTicketEntity->firstName = 'John';
    $createTicketEntity->lastName = 'Doe';
    $createTicketEntity->email = 'c@c.com';
    $createTicketEntity->subject = 'Test Ticket';
    $createTicketEntity->departmentId = $generalDepartmentId;
    $createTicketEntity->message = 'This is a test ticket';

    $createTicketResponseEntity = ZohoDesk::createTicket($createTicketEntity);

    expect($createTicketResponseEntity->email)->toBe('c@c.com')
        ->and($createTicketResponseEntity->subject)->toBe('Test Ticket')
        ->and($createTicketResponseEntity->departmentId)->toBe($generalDepartmentId)
        ->and($createTicketResponseEntity->description)->toBe('This is a test ticket');
});
