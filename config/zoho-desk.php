<?php

// config for Navari/ZohoDesk
return [
    'organizationId' => env('ZOHO_DESK_ORGANIZATION_ID', ''),
    'departmentId' => env('ZOHO_DESK_DEPARTMENT_ID', ''),
    'clientId' => env('ZOHO_DESK_CLIENT_ID', ''),
    'clientSecret' => env('ZOHO_DESK_CLIENT_SECRET', ''),
    'oAuthBaseUrl' => env('ZOHO_DESK_OAUTH_BASE_URL', ''),
    'refreshToken' => env('ZOHO_DESK_REFRESH_TOKEN', ''),
    'baseApiUrl' => env('ZOHO_DESK_BASE_API_URL', 'https://desk.zoho.com/api/v1/'),
    'agentEmail' => env('ZOHO_DESK_AGENT_EMAIL', ''),
];
