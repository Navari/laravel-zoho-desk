<?php

namespace Navari\ZohoDesk\Entities\Ticket;

use Navari\ZohoDesk\Entities\BaseEntity;

class Team extends BaseEntity
{
    public ?string $name;
    public ?string $id;
    public ?string $logoUrl;
}
