<?php

namespace App\Service;

class GeoAPImanager
{
    const API_URL = 'https://api-adresse.data.gouv.fr';

    public $client;
    /**
     * Constructor.
     */
    public function __construct() {
        if (!function_exists('curl_init')) {
            $msg = 'Geo API gouv.fr requires CURL module';
            \Symfony::logger('bluedropfr_syndicalisation_new')->error($msg);
            return;
        }
        $this->client = \Symfony::httpClient();
    }

    /**
     * Do CURL request with authorization.
     *
     * @param string $resource
     *   A request action of api.
     * @param string $method
     *   A method of curl request.
     * @param Array $inputs
     *   A data of curl request.
     *
     * @return array
     *   An associate array with respond data.
     */
    private function executeCurl($resource, $method, $inputs) {
        if (!function_exists('curl_init')) {
            $msg = 'Geo API gouv.fr requires CURL module';
            \Drupal::logger('bluedropfr_syndicalisation_new')->error($msg);
            return NULL;
        }
        $api_url = self::API_URL . "/" . $resource;

        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
        ];

        if (!empty($inputs)) {

            if($method == 'GET'){
                $api_url.= '?' . self::arrayKeyfirst($inputs) . '=' . array_shift($inputs);
                foreach($inputs as $param => $value){
                    $api_url.= '&' . $param . '=' . $value;
                }
            }else{
                //POST request send data in array index form_params.
                //$options['body'] = $inputs;
            }
        }

        try {
            $clientRequest = $this->client->request($method, $api_url, $options);
            $body = $clientRequest->getBody();
        } catch (RequestException $e) {
            \Drupal::logger('bluedropfr_syndicalisation_new')->error('Curl error: @error', ['@error' => $e->getMessage()]);
        }

        return Json::decode($body);
    }

    /**
     * Get Request of API.
     *
     * @param string $resource
     *   A request action.
     * @param string $input
     *   A data of curl request.
     *
     * @return array
     *   A respond data.
     */
    public function curlGet($resource, $inputs) {
        return $this->executeCurl($resource, "GET", $inputs);
    }

    /**
     * Post Request of API.
     *
     * @param string $resource
     *   A request action.
     * @param string $inputs
     *   A data of curl request.
     *
     * @return array
     *   A respond data.
     */
    public function curlPost($resource, $inputs) {
        return $this->executeCurl($resource, "POST", $inputs);
    }

    /**
     * Search place by street number, city name, street name...
     *
     * @param array $options
     *   An array of search options.
     *
     * @return array
     *   An array of search results.
     */
    public function searchPlace($options) {
        return $this->curlGet("search", $options);
    }

    /**
     * Get campaigns by type.
     *
     * @param string $type
     *   A campaign type.
     *
     * @return array
     *   An array of options.
     */
    public function buildOptionsSearchAutocomplete($searchString, $type, $limit = 5, $autocomplete = 1) {
        $options = [
            "q" => $searchString,
            "type" => $type,
            "autocomplete" => $autocomplete,
            "limit" => $limit,
        ];
        return $options;
    }

    /**
     * Function to return first element of the array, compatability with PHP 5, note that array_key_first is only available for PHP > 7.3.
     *
     * @param array $array
     *   Associative array.
     *
     * @return string
     *   The first key data.
     */
    public static function arrayKeyfirst($array){
        if (!function_exists('array_key_first')) {
            foreach($array as $key => $unused) {
                return $key;
            }
            return NULL;
        }else{
            return array_key_first($array);
        }
    }
}