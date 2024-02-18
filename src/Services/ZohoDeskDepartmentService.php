<?php

namespace Navari\ZohoDesk\Services;

use Navari\ZohoDesk\Entities\CreateDepartmentEntity;
use Navari\ZohoDesk\Entities\CreateDepartmentResponseEntity;
use Navari\ZohoDesk\Entities\DepartmentResponseEntity;
use Navari\ZohoDesk\Exceptions\ZohoDeskBadResponseException;
use Navari\ZohoDesk\Exceptions\ZohoDeskRequestFailedException;
use Navari\ZohoDesk\Facades\ZohoDesk;

class ZohoDeskDepartmentService extends BaseService
{
    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function createDepartment(CreateDepartmentEntity $departmentEntity): CreateDepartmentResponseEntity
    {
        $data = $this->sendRequest('POST', 'departments', body: $departmentEntity->toArray());

        return new CreateDepartmentResponseEntity(
            ...$data
        );
    }

    /**
     * @return DepartmentResponseEntity[]
     *
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getDepartments(): array
    {
        $data = $this->sendRequest('GET', 'departments');

        return array_map(static function ($department) {
            return new DepartmentResponseEntity(
                ...$department
            );
        }, $data);
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getDepartment(string $departmentId): DepartmentResponseEntity
    {
        $data = $this->sendRequest('GET', "departments/$departmentId");

        return new DepartmentResponseEntity(
            ...$data
        );
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws ZohoDeskRequestFailedException
     * @throws \JsonException
     */
    public function getGeneralDepartment(): DepartmentResponseEntity
    {
        $data = $this->sendRequest('GET', 'departments', query: ['searchStr' => 'General']);
        if (count($data) === 0) {
            $defaultAgent = ZohoDesk::getDefaultAgent();
            $createDepartmentEntity = new CreateDepartmentEntity();
            $createDepartmentEntity->name = 'Test Department';
            $createDepartmentEntity->description = 'This is a test department';
            $createDepartmentEntity->isVisibleInCustomerPortal = true;
            $createDepartmentEntity->isAssignToTeamEnabled = true;
            $createDepartmentEntity->nameInCustomerPortal = 'Test Department';
            $createDepartmentEntity->associatedAgentIds = [
                $defaultAgent->id,
            ];
            $createDepartmentResponseEntity = $this->createDepartment($createDepartmentEntity);

            return new DepartmentResponseEntity(
                ...$createDepartmentResponseEntity->toArray()
            );
        }

        return new DepartmentResponseEntity(
            ...$data['data'][0]
        );

    }
}
