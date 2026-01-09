<?php

declare(strict_types=1);

namespace SharpAPI\HRJobDescription;

use GuzzleHttp\Exception\GuzzleException;
use SharpAPI\Core\Client\SharpApiClient;
use SharpAPI\HRJobDescription\DTO\JobDescriptionParameters;

/**
 * Generate professional job descriptions using AI - creates detailed JD from parameters
 *
 * @package SharpAPI\HRJobDescription
 * @api
 */
class JobDescriptionGeneratorClient extends SharpApiClient
{
    public function __construct(
        string $apiKey,
        ?string $apiBaseUrl = 'https://sharpapi.com/api/v1',
        ?string $userAgent = 'SharpAPIPHPHRJobDescription/1.0.0'
    ) {
        parent::__construct($apiKey, $apiBaseUrl, $userAgent);
    }

    /**
     * Generate professional job descriptions using AI - creates detailed JD from parameters
     *
     * @param JobDescriptionParameters $params Job description parameters
     * @return string Status URL for polling the job result
     * @throws GuzzleException
     * @api
     */
    public function generateJobDescription(JobDescriptionParameters $params): string
    {
        $response = $this->makeRequest('POST', '/hr/job_description', $params->toArray());

        return $this->parseStatusUrl($response);
    }
}
