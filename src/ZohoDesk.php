<?php

namespace Navari\ZohoDesk;

use Navari\ZohoDesk\Entities\AgentResponseEntity;
use Navari\ZohoDesk\Entities\CreateDepartmentEntity;
use Navari\ZohoDesk\Entities\CreateDepartmentResponseEntity;
use Navari\ZohoDesk\Entities\DepartmentResponseEntity;
use Navari\ZohoDesk\Entities\Ticket\CreateTicketEntity;
use Navari\ZohoDesk\Entities\Ticket\TicketResponseEntity;
use Navari\ZohoDesk\Exceptions\ZohoDeskBadResponseException;
use Navari\ZohoDesk\Exceptions\ZohoDeskRequestFailedException;
use Navari\ZohoDesk\Services\ZohoDeskAgentService;
use Navari\ZohoDesk\Services\ZohoDeskDepartmentService;
use Navari\ZohoDesk\Services\ZohoDeskTicketService;

class ZohoDesk
{
    public function __construct(
        private readonly ZohoDeskDepartmentService $zohoDeskDepartmentService,
        private readonly ZohoDeskAgentService $zohoDeskAgentService,
        private readonly ZohoDeskTicketService $zohoDeskTicketService
    ) {
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws ZohoDeskRequestFailedException
     * @throws \JsonException
     */
    public function createDepartment(CreateDepartmentEntity $createDepartmentEntity): CreateDepartmentResponseEntity
    {
        return $this->zohoDeskDepartmentService->createDepartment($createDepartmentEntity);
    }

    public function getDefaultAgent(): AgentResponseEntity
    {
        return $this->zohoDeskAgentService->getDefaultAgent();
    }

    public function getDepartments(): array
    {
        return $this->zohoDeskDepartmentService->getDepartments();
    }

    public function getDepartment(string $departmentId): DepartmentResponseEntity
    {
        return $this->zohoDeskDepartmentService->getDepartment($departmentId);
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getGeneralDepartment(): DepartmentResponseEntity
    {
        return $this->zohoDeskDepartmentService->getGeneralDepartment();
    }

    public function getAgent(string $agentId): AgentResponseEntity
    {
        return $this->zohoDeskAgentService->getAgent($agentId);
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getTickets(): array
    {
        return $this->zohoDeskTicketService->getTickets();
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getTicket(string $ticketId): TicketResponseEntity
    {
        return $this->zohoDeskTicketService->getTicket($ticketId);
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function createTicket(CreateTicketEntity $createTicketEntity): TicketResponseEntity
    {
        return $this->zohoDeskTicketService->createTicket($createTicketEntity);
    }

    public function getZohoDeskTicketService(): ZohoDeskTicketService
    {
        return $this->zohoDeskTicketService;
    }

    public function getZohoDeskDepartmentService(): ZohoDeskDepartmentService
    {
        return $this->zohoDeskDepartmentService;
    }

    public function getZohoDeskAgentService(): ZohoDeskAgentService
    {
        return $this->zohoDeskAgentService;
    }
}
