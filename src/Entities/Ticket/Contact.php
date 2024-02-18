<?php

namespace Navari\ZohoDesk\Entities\Ticket;

use Navari\ZohoDesk\Entities\BaseEntity;

class Contact extends BaseEntity
{
    public ?string $firstName;
    public ?string $lastName;
    public ?string $phone;
    public ?string $mobile;
    public ?string $id;
    public ?string $type;
    public ?string $email;
    public ?Account $account;

}
