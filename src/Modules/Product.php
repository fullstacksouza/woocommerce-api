<?php
namespace WmDeveloper\Woocommerce\Modules;
use WmDeveloper\Woocommerce\Request;

class Product
{
    protected $request;
    function __construct(){
        $this->request = new Request();
    }

      /**
     * Get products method.
     * return all products
     * @param array  $parameters Request parameters.
     *
     * @return array
     */
    public function all($params = [])
    {
        $query = $this->request->mountUrl("GET",'products');
        return $this->request->makeRequest("GET",'products',$query);
    }
     /**
     * Get products method.
     * return  product details
     * @param int  $id product id.
     *
     * @return array
     */
    public function find($id = '')
    {
        $query = $this->request->mountUrl("GET","products/$id");
        $product =  $this->request->makeRequest("GET","products/$id",$query,'variations');
        $product = (array) $product;
        // dd($product);
        $product['data']->variations= $this->variations($id);
        return $product;
    }

    public function variations($id ='')
    {
        $query = $this->request->mountUrl("GET","products/$id/variations");
        $variations = $this->request->makeRequest("GET","products/$id/variations",$query);
        return $variations['data'];
    }


}
