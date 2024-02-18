<?php

namespace Navari\ZohoDesk\Entities\Ticket;

use Navari\ZohoDesk\Entities\BaseEntity;

class TicketResponseEntity extends BaseEntity
{
    public ?string $ticketNumber;

    public ?string $subCategory;

    public ?string $subject;

    public ?string $dueDate;

    public ?string $departmentId;

    public ?string $channel;

    public ?bool $isRead;

    public ?string $onholdTime;

    public ?string $language;

    public ?Source $source;

    public ?string $closedTime;

    public ?string $sharedCount;

    public ?string $responseDueDate;

    public ?Contact $contact;

    public ?string $createdTime;

    public ?string $id;

    public ?Department $department;

    public ?string $email;

    public ?string $channelCode;

    public ?string $customerResponseTime;

    public ?string $productId;

    public ?string $contactId;

    public ?string $threadCount;

    public ?Team $team;

    public ?string $priority;

    public ?string $assigneeId;

    public ?string $commentCount;

    public ?string $accountId;

    public ?string $phone;

    public ?string $webUrl;

    public ?string $teamId;

    public ?Assignee $assignee;

    public ?bool $isSpam;

    public ?string $category;

    public ?string $status;

    public ?string $description;
}
