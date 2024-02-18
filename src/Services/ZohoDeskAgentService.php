<?php

namespace Navari\ZohoDesk\Services;

use Navari\ZohoDesk\Entities\AgentResponseEntity;
use Navari\ZohoDesk\Exceptions\ZohoDeskBadResponseException;
use Navari\ZohoDesk\Exceptions\ZohoDeskRequestFailedException;

class ZohoDeskAgentService extends BaseService
{
    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getDefaultAgent(): AgentResponseEntity
    {
        $data = $this->sendRequest('GET', 'agents', query: [
            'fieldName' => 'emailId',
            'searchStr' => config('zoho-desk.agentEmail'),
        ]);
        $data = array_filter($data['data'], static function ($agent) {
            return $agent['emailId'] === config('zoho-desk.agentEmail');
        });

        return new AgentResponseEntity(
            ...$data[0]
        );
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws \JsonException
     * @throws ZohoDeskRequestFailedException
     */
    public function getAgent(string $agentId)
    {
        $data = $this->sendRequest('GET', "agents/$agentId");

        return new AgentResponseEntity(
            ...$data
        );
    }
}
