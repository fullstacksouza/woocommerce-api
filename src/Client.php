<?php
namespace WmDeveloper\Woocommerce;
use WmDeveloper\Woocommerce\Modules\Product;
use WmDeveloper\Woocommerce\Modules\Order;
use WmDeveloper\Woocommerce\Modules\PaymentGateway;
class WoocommerceApi
{
    protected $product;
    protected $order;
    protected $woocommerce_consumer_key;
    protected $woocommerce_consumer_secret;
    protected $headers;
    protected $base_uri;
    protected $api_prefix;
    function __construct(){
        $this->order = new Order();
        $this->product = new Product();
    }

     /**
     * Get products method.
     *
     * @param array  $parameters Request parameters.
     *
     * @return array
     */
    public function getProducts($params = [])
    {
        return $this->product->all();
        // $query = $this->request->mountUrl("GET",'products');
        // return $this->request->makeRequest("GET",'products',$query);
    }
    public function getProductById($id = '')
    {
        return $this->product->find($id);
    }

    public function getOrders()
    {
        return $this->order->all();
    }

    public function getOrdersByCostumerId($id)
    {
        return $this->order->costumerOrders($id);
    }

    public function getPaymentGatways()
    {

    }
}
