<?php
namespace WmDeveloper\Woocommerce\Modules;
use WmDeveloper\Woocommerce\Request;

class Order
{
    protected $request;
    protected $params;
    function __construct(){
        $this->request = new Request();
        $this->params = [
            'id',
            'parent_id',
            'number',
            'order_key',
            'created_via',
            'version',
            'status',
            'currency',
            'date_created',
            'date_modified',
            'date_created_gmt',
            'date_modified_gmt',
            'discount_total',
            'discount_tax',
            'shipping_total',
            'shipping_tax',
            'cart_tax',
            'total',
            'total_tax',
            'prices_include_tax',
            'customer_id',
            'customer_ipdress',
            'customer_usagent',
            'customer_no',
            'billing',
            'shipping',
            'payment_met',
            'payment_met_title',
            'transaction',
            'date_paid',
            'date_paid_g',
            'date_comple',
            'date_comple_gmt',
            'cart_hash',
            'meta_data',
            'line_items',
            'tax_lines',
            'shipping_li',
            'fee_lines',
            'coupon_line',
            'refunds',
            'set_paid',

        ];
    }

      /**
     * Get orders method.
     * return all products
     * @param array  $parameters Request parameters.
     *
     * @return array
     */
    public function all($params = [])
    {
        $query = $this->request->mountUrl("GET",'orders');
        return $this->request->makeRequest("GET",'orders',$query);
    }
    public function costumerOrders($id)
    {   $params = [
        'customer'=>$id
    ];
        $query = $this->request->mountUrl("GET",'orders',$params);
        return $this->request->makeRequest("GET",'orders',$query);
    }
     /**
     * Get orders method.
     * return  product details
     * @param int  $id product id.
     *
     * @return array
     */
    public function find($id = '')
    {
        $query = $this->request->mountUrl("GET","orders/$id");
        $order =  $this->request->makeRequest("GET","orders/$id",$query);
        return $order;
    }

    public function update($id,$params = [])
    {
        $aprams = $this->params;
        $query = $this->request->mountUrl("GET",'orders',$params);
        return $this->request->makeRequest("GET",'orders',$query);
    }



}
