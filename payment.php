<?php include('config/db_connect.php'); ?>

<?php
session_start();

if (isset($_POST['submit'])) {
   $id=$_POST['id'];
   $food=$_POST['food'];
   $price=$_POST['price'];
   $qty=$_POST['qty'];
   $total=$price * $qty;
   $order_date=date("Y-m-d h:i:sa");
   $status="ordered";
   $customer_name=$_POST['full-name'];
   $customer_contact=$_POST['contact'];
   $customer_email=$_POST['email'];
   $customer_address=$_POST['address'];

   $sql="INSERT INTO `tbl_order` SET food='$food',price=$price,qty=$qty,total=$total,order_date='$order_date',status='$status',customer_name='$customer_name',customer_contact='$customer_contact',customer_email='$customer_email',customer_address='$customer_address'";
   $result=mysqli_query($conn,$sql) or die(mysqli_error());
   if ($result){
    include 'instamojo\Instamojo.php';
   
//    $authType = "app/user" 

//    $api = Instamojo\Instamojo::init($authType,[
//     "client_id" =>  'test_d203afcc67a3b3375ba44f59a5e',
//     "client_secret" => 'test_cd6bec2c9e6288e3ca8fe2c7164'
// ]);

// $api = new \Instamojo\Instamojo(
//     config('services.instamojo.test_d203afcc67a3b3375ba44f59a5e'),
//     config('services.instamojo.test_cd6bec2c9e6288e3ca8fe2c7164'),
//     config('services.instamojo.https://test.instamojo.com/api/1.1/')
// );
//    $api = new Instamojo\Instamojo('test_d203afcc67a3b3375ba44f59a5e','test_cd6bec2c9e6288e3ca8fe2c7164','https://test.instamojo.com/api/1.1/');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_d203afcc67a3b3375ba44f59a5e",
                  "X-Auth-Token:test_cd6bec2c9e6288e3ca8fe2c7164"));
$payload = Array(
    'purpose' =>  $food,
    'amount' => $total,
    'phone' => $customer_contact,
    'buyer_name' => $customer_name,
    'redirect_url' => 'http://localhost/food-order/handle.php',
    'send_email' => true,
    // 'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' =>  $customer_email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$response=json_decode($response);
header('location:'.$response->payment_request->longurl);
die();
//    try {
//     $response = $api->createPaymentRequest(array(
//         "purpose" => $food,
//         "amount" => $price,
//         "send_email" => true,
//         "email" => $email,
//         "customer_name" => $customer_name,
//         "customer_contact" => $customer_contact,
//         "send_sms" => true,
//         "allow_repeated_payments" => false,
//         "redirect_url" => "http://localhost/food-order/handle.php"
//         ));
//     // print_r($response);
//     $pay_url=$response['longurl'];
//     header('location:$pay_url');
// }
// catch (Exception $e) {
//     print('Error: ' . $e->getMessage());
// }
 }
 else {
    $_SESSION['add']="<script>alert('Sorry! , Your order is not Accepted , Please try again.')</script>";
    header("Location:http://localhost/food-order/");
 }
}
?>