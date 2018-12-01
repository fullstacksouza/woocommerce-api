<?php
namespace WmDeveloper\Woocommerce;
use GuzzleHttp\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;
use Automattic\WooCommerce\HttpClient\OAuth;

class Request
{
    protected $client;
    protected $woocommerce_consumer_key;
    protected $woocommerce_consumer_secret;
    protected $headers;
    protected $base_uri;
    protected $api_prefix;
    function __construct(){
        $this->api_prefix = "wp-json/wc/v3/";
        $this->base_uri =env('WOOCOMMERCE_STORE_URL',"http://woocommerce-api.esy.es/");
        $this->woocommerce_consumer_key = env('CONSUMER_WOOCOMMERCE_KEY',"ck_e5abe40e102881bc9103790c93daf4e6156c9ecc");
        $this->woocommerce_consumer_secret = env('CONSUMER_WOOCOMMERCE_SECRET',"cs_317aa35f8c326bcade6ce6d4cdce9141e14a99b5");
        $this->client = new Client([

    'base_uri' => $this->base_uri.$this->api_prefix,
            'defaults' => [
            'exceptions' => false
        ]]);


        return $this->client;
    }

    public function mountUrl($method = null,$endpoint = '',$params = [])
    {
        $url = $this->base_uri."wp-json/wc/v3/".$endpoint;
        // dd($url);
        $oAuth   = new OAuth(
            $url,
            $this->woocommerce_consumer_key,
            $this->woocommerce_consumer_secret,
            'v3',
            "GET",
            $params,
            \time()
        );
        $parameters = $oAuth->getParameters();
        $url = $this->buildUrlQuery($endpoint,$parameters);
         return $url;
    }
    public function buildUrlQuery($url, $parameters = [])
    {
        if (!empty($parameters)) {
            $query =  \http_build_query($parameters);
            // $url .= '?' . \http_build_query($parameters);
        }

        return $query;
    }
    public function makeRequest($method = "GET",$endpoint = '',$query = [],$extraField = '')
    {
        $return = [
            'success'=>false,
            'data'=> [
                $extraField => ''
            ],
            'messages' => '',
        ];
        $response = $this->client->request('GET', $endpoint,[
            'verify'=>false,
            'query'=>$query
            ]);
        /**
         * response attributes
         */
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $contents = $body->getContents();
        $return['data'] = json_decode($contents);
        if($code === 200)
        {
            $return['success'] = true;
        }
        return $return;
    }
}
