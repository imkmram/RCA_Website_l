<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session\Store;
use Razorpay\Api\Api;
use Session;
use App\Models\OrderDetails;

class RazorpayController extends ApplicationController
{   

    /*public function index()
    {    
        echo "hello";exit;    
        //return view('payWithRazorpay');
    } */
    public function index(Request $request)
    {   
        $getrequest = $request->all();
        // echo "<pre>";print_r($getrequest);exit;
        $order_code = isset($getrequest['order_code'])? $getrequest['order_code']:'';
        $currency = isset($getrequest['currency'])? $getrequest['currency']:'';
        $order_id = isset($getrequest['order_id'])? $getrequest['order_id']:'';
        $amount = isset($getrequest['amount'])? $getrequest['amount']:'';
        $amount = (int)$amount*100;
        $user_name = isset($getrequest['user_name'])? $getrequest['user_name']:'';
        $email_id = isset($getrequest['email_id'])? $getrequest['email_id']:'';
        $phone_number = isset($getrequest['phone_number'])? $getrequest['phone_number']:'';
        $productinfo = isset($getrequest['productinfo'])?$getrequest['productinfo']:NULL;
        $ccode = isset($getrequest['ccode'])?$getrequest['ccode']:NULL;
        //print_r($getrequest);
        //echo "<br>";
        //exit;
        //echo "hello1";exit;    
        return view('razorpay/payWithRazorpay',compact('order_code','currency','order_id','amount','user_name','email_id','phone_number','productinfo','ccode'));
    }

    public function payment()
    {
        //Input items of form
        $input = Input::all();
        $amount = "";
        $response = array();
        Session::forget('success');
        //get API Configuration 
        $api = new Api(config('custom.razor_key'), config('custom.razor_secret'));
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        // echo "<pre>";print_r($payment);exit;
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                // $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

                $amount = (int)$payment->amount/100;
                $response = array(
                    'order_id'=> !empty($payment->notes['order_id'])?$payment->notes['order_id']:NULL,
                    'order_code'=> !empty($payment->notes['order_code'])?$payment->notes['order_code']:NULL,
                    'order_date'=>!empty($payment->created_at)?date('d M Y', $payment->created_at):NULL,
                    'order_name'=> !empty($payment->notes['username'])?preg_replace("~[^a-z0-9:]~i", " ", $payment->notes['username']):NULL,
                    'order_status'=> !empty($payment->status)?$payment->status:NULL,
                    'txnid'=> !empty($payment->id)?$payment->id:NULL,
                    'amount'=>!empty($amount)?round($amount):NULL,
                    'email_id'=>!empty($payment->email)?$payment->email:NULL,
                    'productinfo'=> !empty($payment->notes['productinfo'])?$payment->notes['productinfo']:NULL,
                    'ccode'=> !empty($payment->notes['ccode'])?$payment->notes['ccode']:NULL,
                    'payment_timestamp'=> date('Y-m-d H:i:s')
                );
                // echo "<pre>";print_r($response);exit;
                $sendmail = new ApplicationController;
                
                $orderupdate = OrderDetails::firstOrCreate(['order_id'=>$response['order_id']]);
                $orderupdate->payment_status = $response['order_status'];
                $orderupdate->total_price = $response['amount'];
                $orderupdate->payment_timestamp = $response['payment_timestamp'];
                $orderupdate->save();

                $to = $response['email_id'];
                $cust_name = $response['order_name'];
                $trans_date = $response['order_date'];
                $ord_id = $response['order_code'];
                $py_status = $response['order_status'];
                $amt = $response['amount'];
                $trans_ref = $response['txnid'];
                
                $content = "Dear $cust_name,<br><br>Welcome to the RedCarpet Assist family. We would like to thank you for your order. Our team is already processing your details and will be in touch for any additional information required to complete the order.<br><br><br>

                    <table style='text-align:center; line-height:35px; font-family:Open Sans; margin:0 auto; font-weight: normal; max-width:550px; width:100%;'>
        <tr>
            <td colspan='2'>
                <h2 style='font-size: 30px; color:#ed1c24; font-weight: 600; margin:0 auto'>Congratulations</h2>
            </td>
        <tr>
            <td colspan='2' style='text-align: center'>
                <p style='margin: 5px 0; font-size: 17px;'>Thank you for your payment. Please find your payment receipt</p>
            </td>
        </tr>
        <tr>
            <td colspan='2' style='text-align: center; font-size: 17px;'>Order Number : <strong style='color:#333; font-weight:600;font-size: 17px;'>$ord_id</strong>
            </td>
        </tr>
        <tr>
            <td colspan='2' style='text-align: center;padding-bottom:20px;font-size: 17px;'>Transaction Reference Number : <strong style='color:#333; font-weight:600;font-size: 17px;'>$trans_ref</strong>
            </td>
        </tr>
        <tr>
            <td style='text-align: left;padding: 0px 0 0 30px;font-size: 17px;'>You Purchased<br><strong style='color:#333; font-weight:600;font-size: 17px;'>PAR-Pre
                    Arrival
                    Registation</strong></td>
            <td width='30%' style='text-align: right;'><span style='font-size:25px;'><strong style='color:#333; font-weight:600;padding: 0 30px 0 0px;'>$ $amt</strong></span></td>
        </tr>
        <tr>
            <td colspan='2' style='padding: 0 30px 0 30px;'>
                <hr style='border-top:thin solid #bbb;padding: 0 30px 0 30px;'>
            </td>
        </tr>
        <tr>
            <td style='text-align: left; font-size:25px;padding: 0 0 0 30px;'>Total</td>
            <td width='30%' style='text-align: right'><span style='font-size:25px;'><strong style='color:#333;font-weight:600; padding: 0 30px 0 0px;'>$ $amt</strong></span></td>
        </tr>
    </table>

    <table style='text-align:center; line-height:35px; font-family:Open Sans; margin:0 auto; font-weight: normal; max-width:600px; width:100%;'>
        <tr>
            <td colspan='2' style='text-align: center; padding-top:20px; font-size:17px;'>Our RedCarpet Assist Team will proceed with your application and will keep in touch with you. In case you need to speak to us, call us on +91 22-6253 8600 or email us at <span style='color:#ed1c24;'>customercare@redcarpetassist.com</span>
            </td>
        </tr>
    </table>

                    <br><br><br>Your RedCarpet Assist Team.<br><br><i>Add support@redcarpetassist.com to your address book to ensure that our mails reach your Inbox.</i>";

                $subject ="We are rolling out the RedCarpet for you";
                $sendmail->sendEmail("support@redcarpetassist.com",$to,null,null, $subject, $content);

                Session::flush(); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }

            //return redirect()->route('payment-success');
        } else{
            //return redirect()->route('payment-fail');
        }

        return view('razorpay/payment',compact('response'));
        
        // \Session::put('success', 'Payment successful, you will receive the invoice in your email.');
        // return redirect()->back();
    }
}