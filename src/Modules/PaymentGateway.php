<?php
namespace WmDeveloper\Woocommerce\Modules;
use WmDeveloper\Woocommerce\Request;
class PaymentGateway
{
    protected $request;
    function __construct(){
        $this->request = new Request();
    }

    public function all($params = [])
    {
        $query = $this->request->mountUrl("GET",'payment_gateways');
        return $this->request->makeRequest("GET",'payment_gateways',$query);
    }
     /**
     * Get payment gateway method.
     * return  product details
     * @param int  $id payment gateway id.
     *
     * @return array
     */
    public function find($id = '')
    {
        $query = $this->request->mountUrl("GET","payment_gateways/$id");
        $product =  $this->request->makeRequest("GET","payment_gateways/$id",$query);
        $product = (array) $product;
        // dd($product);
        $product['data']->variations= $this->variations($id);
        return $product;
    }
}
