<?php

namespace Navari\ZohoDesk\Entities;

class CreateDepartmentEntity extends BaseEntity
{
    public string $name;
    public string $nameInCustomerPortal;
    public string $description;
    public bool $isVisibleInCustomerPortal;
    public bool $isAssignToTeamEnabled;
    public ?array $associatedAgentIds = [];

}
