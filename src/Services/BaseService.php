<?php

namespace Navari\ZohoDesk\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\Cache;
use Navari\ZohoDesk\Exceptions\ZohoDeskBadResponseException;
use Navari\ZohoDesk\Exceptions\ZohoDeskRequestFailedException;

class BaseService
{
    private Client $client;

    public function __construct(
    ) {
        $this->client = new Client();
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws ZohoDeskRequestFailedException
     */
    protected function getAccessToken(
        bool $disableCache = false
    ): string {
        if (! $disableCache && Cache::has('zoho-desk-access-token')) {
            return Cache::get('zoho-desk-access-token');
        }
        $uri = new Uri(config('zoho-desk.oAuthBaseUrl').'/token');

        $request = new Request('POST', $uri->withQuery(
            http_build_query([
                'refresh_token' => config('zoho-desk.refreshToken'),
                'client_id' => config('zoho-desk.clientId'),
                'client_secret' => config('zoho-desk.clientSecret'),
                'grant_type' => 'refresh_token',
            ])
        ));
        try {
            $response = $this->client->send($request);
        } catch (GuzzleException $e) {
            throw new ZohoDeskRequestFailedException('Failed to get access token', 0, $e);
        }

        try {
            $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new ZohoDeskBadResponseException('Failed to parse access token response', 0, $e);
        }

        Cache::put('zoho-desk-access-token', $data['access_token'], $data['expires_in'] / 60);

        return $data['access_token'];
    }

    /**
     * @throws ZohoDeskBadResponseException
     * @throws ZohoDeskRequestFailedException|\JsonException
     */
    protected function sendRequest(string $method, string $url, array $headers = [], array $query = [], array $body = []): array
    {
        $accessToken = $this->getAccessToken();
        $uri = new Uri(config('zoho-desk.baseApiUrl', 'https://desk.zoho.com/api/v1/').$url);
        $request = new Request($method, $uri->withQuery(
            http_build_query($query)
        ), array_merge($headers, [
            'Authorization' => 'Zoho-oauthtoken '.$accessToken,
            'orgId' => config('zoho-desk.organizationId'),
        ]), json_encode($body, JSON_THROW_ON_ERROR));
        try {
            $response = $this->client->send($request);
        } catch (GuzzleException $e) {
            throw new ZohoDeskRequestFailedException('Failed to connect url : '.$url, 0, $e);
        }
        try {
            $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new ZohoDeskBadResponseException('Failed to parse response : '.$response->getBody()->getContents(), 0, $e);
        }

        return $data;
    }
}
