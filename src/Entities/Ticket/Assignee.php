<?php

namespace Navari\ZohoDesk\Entities\Ticket;

use Navari\ZohoDesk\Entities\BaseEntity;

class Assignee extends BaseEntity
{
    public ?string $firstName;

    public ?string $lastName;

    public ?string $photoUrl;

    public ?string $id;

    public ?string $email;
}
