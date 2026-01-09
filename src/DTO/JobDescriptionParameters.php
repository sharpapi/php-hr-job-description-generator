<?php

declare(strict_types=1);

namespace SharpAPI\HRJobDescription\DTO;

/**
 * Data Transfer Object for Job Description Generation parameters
 *
 * @api
 */
class JobDescriptionParameters
{
    public function __construct(
        public string $name,
        public ?string $companyName = null,
        public ?string $minimumEducation = null,
        public ?string $minimumWorkExperience = null,
        public ?string $employmentType = null,
        public ?string $country = null,
        public ?bool $remote = null,
        public ?bool $visaSponsored = null,
        public ?array $requiredSkills = null,
        public ?array $optionalSkills = null,
        public string $language = 'English',
        public ?string $voiceTone = null,
        public ?string $context = null
    ) {}

    /**
     * Convert parameters to array for API request
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'company_name' => $this->companyName,
            'minimum_education' => $this->minimumEducation,
            'minimum_work_experience' => $this->minimumWorkExperience,
            'employment_type' => $this->employmentType,
            'country' => $this->country,
            'remote' => $this->remote,
            'visa_sponsored' => $this->visaSponsored,
            'required_skills' => $this->requiredSkills,
            'optional_skills' => $this->optionalSkills,
            'language' => $this->language,
            'voice_tone' => $this->voiceTone,
            'context' => $this->context,
        ], fn($v) => $v !== null);
    }
}
