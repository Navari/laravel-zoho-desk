<?php

namespace Navari\ZohoDesk\Entities\Ticket;

use Navari\ZohoDesk\Entities\BaseEntity;

class CreateTicketEntity extends BaseEntity
{
    public string $firstName;

    public string $lastName;

    public string $email;

    public string $subject;

    public string $departmentId;

    public string $message;
}
