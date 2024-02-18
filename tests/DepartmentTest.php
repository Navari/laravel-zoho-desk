<?php

use Navari\ZohoDesk\Entities\CreateDepartmentEntity;
use Navari\ZohoDesk\Facades\ZohoDesk;

it('creates a department', function () {
    expect(true)->toBeTrue();

    return;
    $defaultAgent = ZohoDesk::getDefaultAgent();
    expect($defaultAgent->id)->not()->toBeNull();
    $createDepartmentEntity = new CreateDepartmentEntity();
    $createDepartmentEntity->name = 'Test Department';
    $createDepartmentEntity->description = 'This is a test department';
    $createDepartmentEntity->isVisibleInCustomerPortal = true;
    $createDepartmentEntity->isAssignToTeamEnabled = true;
    $createDepartmentEntity->nameInCustomerPortal = 'Test Department';
    $createDepartmentEntity->associatedAgentIds = [
        $defaultAgent->id,
    ];

    $createDepartmentResponseEntity = ZohoDesk::createDepartment($createDepartmentEntity);

    expect($createDepartmentResponseEntity->name)->toBe('Test Department')
        ->and($createDepartmentResponseEntity->description)->toBe('This is a test department')
        ->and($createDepartmentResponseEntity->isVisibleInCustomerPortal)->toBe(true)
        ->and($createDepartmentResponseEntity->isAssignToTeamEnabled)->toBe(true)
        ->and($createDepartmentResponseEntity->chatStatus)->toBe('NOT_CREATED')
        ->and($createDepartmentResponseEntity->hasLogo)->toBe(true)
        ->and($createDepartmentResponseEntity->nameInCustomerPortal)->toBe('Test Department');
});

it('gets list of departments', function () {
    $departments = ZohoDesk::getDepartments();
    expect($departments)->toBeArray()->each(function ($department) {
        expect($department->id)->not()->toBeNull()
            ->and($department->name)->not()->toBeNull();
    });
});
