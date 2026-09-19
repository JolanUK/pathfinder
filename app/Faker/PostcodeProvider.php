<?php

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Cache;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;

class PostcodeProvider extends Base
{
    private PostcodeService $postcodeService;

    private array $berkshirePostcodes = [
        'RG1' => ['1AA', '1AB', '1AD', '1AE', '1AF', '2AS', '3AH', '4EL', '5AN', '6BB'],
        'RG2' => ['0AA', '7AB', '8AF', '9AD'],
        'RG4' => ['5AA', '5AB', '7AD', '8AE', '8AG', '9AH'],
        'RG5' => ['3AA', '4AB', '4AD'],
        'RG6' => ['1AA', '1AB', '3AD', '5AE', '7AF', '7AG'],
        'RG7' => ['1AA', '1AB', '3AD', '4AE', '5AF', '6AG'],
        'RG8' => ['0AA', '7AB', '8AD', '9AE'],
        'RG10' => ['0AA', '9AB'],
        'RG14' => ['1AA', '2AB', '5AD'],
        'RG18' => ['3AE'],
        'RG19' => ['4AF'],
        'RG20' => ['5AG'],
        'RG30' => ['1AA', '2AB', '3AD', '4AE'],
        'RG31' => ['4AA', '5AB', '6AD'],
        'RG40' => ['1AA', '2AB', '2AD'],
        'RG41' => ['5AE', '5AF'],
        'RG42' => ['6AG', '6AH'],
        'RG45' => ['6AJ', '6AK'],
    ];

    private array $cachedPostcodeData = [];

    public function __construct($generator)
    {
        parent::__construct($generator);
        $this->postcodeService = app(PostcodeService::class);
    }

    /**
     * Generate a random valid postcode
     */
    public function postcode(): string
    {
        $outcode = static::randomElement(array_keys($this->berkshirePostcodes));
        $incode = static::randomElement($this->berkshirePostcodes[$outcode]);

        return $outcode.' '.$incode;
    }

    /**
     * Generate a postcode for a specific area
     */
    public function postcodeByArea(string $area): string
    {
        $outcodes = [
            'central' => ['RG1', 'RG2'],
            'caversham' => ['RG4'],
            'woodley' => ['RG5'],
            'earley' => ['RG6'],
            'tilehurst' => ['RG30', 'RG31'],
            'wokingham' => ['RG40', 'RG41', 'RG42'],
            'newbury' => ['RG14', 'RG18', 'RG19', 'RG20'],
            'bracknell' => ['RG12'],
            'slough' => ['SL1', 'SL2', 'SL3'],
        ];

        $selectedOutcodes = $outcodes[$area] ?? array_keys($this->berkshirePostcodes);
        $outcode = static::randomElement($selectedOutcodes);
        $incode = static::randomElement($this->berkshirePostcodes[$outcode]);

        return $outcode.' '.$incode;
    }

    /**
     * Get postcode data with caching
     */
    public function postcodeData(): array
    {
        $postcode = $this->postcode();

        return $this->fetchPostcodeData($postcode);
    }

    /**
     * Get postcode data for a specific area
     */
    public function postcodeDataByArea(string $area): array
    {
        $postcode = $this->postcodeByArea($area);

        return $this->fetchPostcodeData($postcode);
    }

    /**
     * Get postcode data including all possible fields
     */
    public function fullPostcodeData(): array
    {
        $postcode = $this->postcode();
        $data = $this->fetchPostcodeData($postcode);

        return array_merge([
            'postcode' => $postcode,
            'area' => 'Berkshire',
            'region' => 'South East',
        ], $data);
    }

    /**
     * Fetch postcode data with caching
     */
    private function fetchPostcodeData(string $postcode): array
    {
        // Check cache first (10 minute cache)
        $cacheKey = 'postcode_data_'.str_replace(' ', '', $postcode);

        return Cache::remember($cacheKey, 600, function () use ($postcode) {
            $validated = $this->postcodeService->validate($postcode);

            if ($validated) {
                $data = $this->postcodeService->getPostcode($postcode);

                return json_decode(json_encode($data), true) ?? [];
            }

            return [];
        });
    }

    /**
     * Get a random postcode with all associated data (single method call)
     */
    public function postcodeWithData(): array
    {
        $postcode = $this->postcode();
        $data = $this->fetchPostcodeData($postcode);

        return [
            'postcode' => $postcode,
            'data' => $data,
        ];
    }

    /**
     * Generate multiple unique postcodes
     */
    public function uniquePostcodes(int $count = 10): array
    {
        $postcodes = [];
        $attempts = 0;
        $maxAttempts = $count * 3;

        while (count($postcodes) < $count && $attempts < $maxAttempts) {
            $postcode = $this->postcode();
            if (! in_array($postcode, $postcodes)) {
                $postcodes[] = $postcode;
            }
            $attempts++;
        }

        return $postcodes;
    }
}
