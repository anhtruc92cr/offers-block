<?php
namespace TNAPI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class APIReader {
    private $api_url;

    public function __construct($api_url) {
        $this->api_url = $api_url;
    }

    public function get_data() {
        $response = wp_remote_get($this->api_url);

        if (is_wp_error($response)) {
            return "Error fetching data";
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);
        
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            return "Error decoding JSON";
        }

        return $data;
    }
}