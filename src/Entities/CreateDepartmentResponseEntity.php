<?php

namespace Navari\ZohoDesk\Entities;

class CreateDepartmentResponseEntity extends BaseEntity
{
    public bool $isAssignToTeamEnabled;

    public string $chatStatus;

    public bool $hasLogo;

    public bool $isVisibleInCustomerPortal;

    public string $creatorId;

    public string $description;

    public array $associatedAgentIds;

    public bool $isDefault;

    public bool $isEnabled;

    public string $name;

    public string $createdTime;

    public string $id;

    public string $nameInCustomerPortal;
}
