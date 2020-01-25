# KATNISS
## Description

This repository is a System of sales with PHP Codeigniter, AJAX and MySQL.

## Installation
Using PHP7, MySQL preferably.

## DataBase
Using Codeigniter Framework and MySQL preferably.

## Apps
Using Postman or RestEasy to feed the api.

## Usage
```html
$ git clone https://github.com/DanielArturoAlejoAlvarez/KATNISS.git [NAME APP] 

```
Follow the following steps and you're good to go! Important:


![alt text](https://mattstauffer.com/assets/images/content/allautocomplete.gif)


## Coding

### Controllers

```php
...
protected function updateVoucher($idvoucher) {
        $currentVoucher = $this->Vtype_model->getVoucherTypeById($idvoucher);
        $data = array(
            'VHR_Qty'       =>      $currentVoucher->VHR_Qty + 1
        );

        $this->Vtype_model->updateVoucherType($idvoucher,$data);
    }

    protected function saveDetailSale($idproducts,$idsale,$prices,$qtys,$amounts) {

        for ($i=0; $i < count($idproducts) ; $i++) { 
            $data = array(
                'PROD_Code'     =>      $idproducts[$i],
                'SALE_Code'     =>      $idsale,
                'PROD_Price'    =>      $prices[$i],
                'DETA_Qty'      =>      $qtys[$i],
                'DETA_Subtotal' =>      $amounts[$i]
            );

            $this->Sale_model->insertDetailSale($data);
            $this->updateStock($idproducts[$i],$qtys[$i]);
        }
    }

    protected function updateStock($idproduct,$qty) {
        $currentProduct = $this->Product_model->getProductById($idproduct);
        $data = array(
            'PROD_Stock'        =>      $currentProduct->PROD_Stock - $qty
        );
        $this->Product_model->updateProduct($idproduct,$data);
    }

...

```
### VIEWS

```javascript
...
function viewOBJDetailSale() {    
  $(document).on("click",".view-details",function() {
      //get the value of every category id
      var value_id = $(this).val();        
      $.ajax({
        url: base_url + "movements/sales/show",
        type: 'POST',
        dataType: "html",
        data: {id: value_id},
        success: function(data) {
          //alert(resp);
          $("#modal-default .modal-body").html(data);
        }
      });
  });
}
...
```

### Model

```php
...
public function getProducts($value) {
        $this->db->select("p.PROD_Code as id,p.PROD_Serial as code,p.PROD_Name as label,p.PROD_Price as price,p.PROD_Stock as stock");
        $this->db->from("products p");
        $this->db->like("p.PROD_Name",$value);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function insertSale($data) {
        return $this->db->insert("sales", $data);
    }

    public function lastID(){
        $last_id = $this->db->insert_id();
        return $last_id; 
    }

    public function insertDetailSale($data) {
        return $this->db->insert("detail_sales", $data);
    }
...
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/DanielArturoAlejoAlvarez/KATNISS. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.


## License

The gem is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).