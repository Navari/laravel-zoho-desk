<?php

namespace Navari\ZohoDesk\Entities;

use Navari\ZohoDesk\Entities\BaseEntity;

class DepartmentResponseEntity extends BaseEntity
{
    public ?bool $isAssignToTeamEnabled;
    public ?string $chatStatus;
    public ?bool $isDefault;
    public ?bool $hasLogo;
    public ?bool $isVisibleInCustomerPortal;
    public ?bool $isEnabled;
    public ?string $name;
    public ?string $creatorId;
    public ?string $description;
    public ?string $createdTime;
    public ?string $id;
    public ?string $nameInCustomerPortal;

}
