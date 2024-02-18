<?php

namespace Navari\ZohoDesk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Navari\ZohoDesk\ZohoDesk
 *
 * @method static \Navari\ZohoDesk\Entities\CreateDepartmentResponseEntity createDepartment(\Navari\ZohoDesk\Entities\CreateDepartmentEntity $createDepartmentEntity)
 * @method static \Navari\ZohoDesk\Entities\AgentResponseEntity getDefaultAgent()
 * @method static \Navari\ZohoDesk\Entities\CreateDepartmentResponseEntity[] getDepartments()
 * @method static \Navari\ZohoDesk\Entities\DepartmentResponseEntity getDepartment(string $departmentId)
 * @method static \Navari\ZohoDesk\Entities\DepartmentResponseEntity getGeneralDepartment()
 * @method static \Navari\ZohoDesk\Entities\AgentResponseEntity getAgent(string $agentId)
 * @method static \Navari\ZohoDesk\Entities\Ticket\TicketResponseEntity createTicket(\Navari\ZohoDesk\Entities\Ticket\CreateTicketEntity $createTicketEntity)
 * @method static \Navari\ZohoDesk\Entities\Ticket\TicketResponseEntity[] getTickets()
 * @method static \Navari\ZohoDesk\Entities\Ticket\TicketResponseEntity getTicket(string $ticketId)
 * @method static \Navari\ZohoDesk\Services\ZohoDeskTicketService getTicketService()
 * @method static \Navari\ZohoDesk\Services\ZohoDeskDepartmentService getDepartmentService()
 * @method static \Navari\ZohoDesk\Services\ZohoDeskAgentService getAgentService()
 */
class ZohoDesk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Navari\ZohoDesk\ZohoDesk::class;
    }
}
