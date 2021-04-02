


<?php 

  echo '<h1>Task1:</h1>';

  class Mammals{
    public $body;
    public $internalOrangs;
    public function breath(){
      echo '*breathing*  <br>';
    }

  }

  trait DogSound{
    public function bark(){
      echo 'Woof ! <br>';
    }
    public function howl(){
      echo 'OwwwwwwwwwOOOOOOOOOO ! <br>';
    }
  }
  trait DogMovement{
    public function dash(){
      echo '*Dog Dashing* <br>';
    }
    public function walking(){
      echo '*Dog walking* ! <br>';
    }
  }

  class Husky extends Mammals{
    use DogSound,DogMovement;
    function __construct(){
      $this->body = 'Husky';
      $this->internalOrgans = 'Husky Internal Layout';

    }
  }
  class Pug extends Mammals{
    use DogSound,DogMovement;
    function __construct(){
      $this->body = 'Pug';
      $this->internalOrgans = 'Pug Internal Layout';
     
    }
  }

  $pug1  = new Pug();
  $husky1 = new Husky();
  $husky1->breath();
  $husky1->dash();
  $husky1->bark();



  // Advantages: 
  //  Easy to do hierachy implementations
  // Disadvantages:
  //  Every class/trait/interface that are inherited are tighly related so we can't use them indepenently.





  echo '<br><br><h1>Task2 :</h1>';

 

  class Payment{
    protected $itemName;
    protected $price;
    protected $quantity;
    protected $methodName;
    protected $total;

    function __construct($methodName){
      $this->methodName = $methodName;
    }

    public function addPayment($itemName, $price, $quantity){
      $this->itemName = $itemName;
      $this->price = $price;
      $this->quantity = $quantity;
      $this->total = $this->price * $this->quantity;
    }

    public function getItemName(){
      return $this->itemName; 
    }
    public function getPrice(){
      return $this->price;
    }
    public function getQuantity(){
      return $this->quantity;
    }
    public function getMethodName(){
      return $this->methodName;
    }
    public function getTotal(){
      return $this->total;
    }



  }

  class Sales{
    private $payments = array() ;


    function __construct(){

    }
    public function addSale($itemName, $price, $quantity, $methodName){
      $payment = new Payment($methodName);
      $payment->addPayment($itemName, $price, $quantity);
      $this->payments[] = $payment;
      
    }

    public function getTotalSales(){
      return sizeof($this->payments);
    }
    public function getSale($index){
      return $this->payments[$index];
    }
    
    public function getSalesNumber($methodName){
      //Future work ?
    }

  }


  $sale = new Sales();


  $sale->addSale('Item 1',5,1,'ABA');
  $sale->addSale('Item 2',3,2,'Wing');
  $sale->addSale('Item 3',4,1,'ABA');
  $sale->addSale('Item 4',5,1,'ABA');
  $sale->addSale('Item 5',6,1,'PiPay');
  $sale->addSale('Item 6',10,1,'ABA');
  $sale->addSale('Item 7',15,1,'Wing');
  $sale->addSale('Item 8',2,1,'Wing');


  echo '

  <style>
  table{
    width: 60%;
  }
  table, th, td {
    border: 1px solid black;
  }
  </style>
  <table >
  <tr>
    <th>Item</th>
    <th>Price</th> 
    <th>Quantity</th>
    <th>Method</th>
    <th>Total</th>
  </tr>
  


  ';

 


  for($i = 0; $i != $sale->getTotalSales(); $i++){
    echo "

    <tr>
    <th>" . $sale->getSale($i)->getItemName(). "</th>
    <th>" . $sale->getSale($i)->getPrice() ."</th> 
    <th>" . $sale->getSale($i)->getQuantity() ."</th> 
    <th>" . $sale->getSale($i)->getMethodName() ."</th> 
    <th>" . $sale->getSale($i)->getTotal() ."</th> 
    

    </tr>
    
    ";
  }
  echo '  </table>';

  

  echo "<h3> 1. Sales by ABA method: " .  $sale->getSalesNumber('ABA') . "</h3>";
  echo "<h3> 2. Sales by PiPay and Wing method: " .  $sale->getSalesNumber('PiPay') + $sale->getSalesNumber('Wing')   . "</h3>";
  echo "<h3> 3. Sales table ordering by the biggest total amount:</h3>";

  echo '

  <style>
  table{
    width: 60%;
  }
  table, th, td {
    border: 1px solid black;
  }
  </style>
  <table >
  <tr>
    <th>Item</th>
    <th>Price</th> 
    <th>Quantity</th>
    <th>Method</th>
    <th>Total</th>
  </tr>
  
  ';

  for($i = 0; $i != $sale->getTotalSales(); $i++){
    echo "

    <tr>
    <th>" . $sale->getSale($i)->getItemName(). "</th>
    <th>" . $sale->getSale($i)->getPrice() ."</th> 
    <th>" . $sale->getSale($i)->getQuantity() ."</th> 
    <th>" . $sale->getSale($i)->getMethodName() ."</th> 
    <th>" . $sale->getSale($i)->getTotal() ."</th> 
    

    </tr>
    
    ";
  }
  echo '  </table>';
?>
