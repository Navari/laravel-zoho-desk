<?php

namespace Navari\ZohoDesk\Entities\Ticket;

use Navari\ZohoDesk\Entities\BaseEntity;

class Source extends BaseEntity
{
    public ?string $appName;
    public ?string $extId;
    public ?string $type;
    public ?string $permalink;
    public ?string $appPhotoUrl;

}
