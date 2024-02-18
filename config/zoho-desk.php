<?php

// config for Navari/ZohoDesk
return [
    'organizationId' => env('ZOHO_DESK_ORGANIZATION_ID', '844836052'),
    'departmentId' => env('ZOHO_DESK_DEPARTMENT_ID', '950652000000006907'),
    'clientId' => env('ZOHO_DESK_CLIENT_ID', '1000.UF17RRQJSZ2Q169T87CWN56FEA2ZWI'),
    'clientSecret' => env('ZOHO_DESK_CLIENT_SECRET', '8737cda5e0a818e807ad572e46f2ef4793564e1adb'),
    'oAuthBaseUrl' => env('ZOHO_DESK_OAUTH_BASE_URL', 'https://accounts.zoho.com/oauth/v2'),
    'refreshToken' => env('ZOHO_DESK_REFRESH_TOKEN', '1000.72ad3d8decc6622bfbafdeb03fa2d237.176bbb7f95d1bb0e80c6ee073ee19fd8'),
    'baseApiUrl' => env('ZOHO_DESK_BASE_API_URL', 'https://desk.zoho.com/api/v1/'),
    'agentEmail' => env('ZOHO_DESK_AGENT_EMAIL', 'support@ezport.com'),
];
