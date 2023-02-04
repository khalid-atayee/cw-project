<?php

/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is developed for payment gateway
 */

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\payments;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Stripe;
use Session;

class PaymentGateWayController extends Controller
{

    public function call(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_51MPxP9Ejah8oK98XTkvigcwQ7De6REbD2x7kfY0QNroCyTyGTg5opOATqtULZRjV1aEx6LiKkqKKEBQItR9RIDM500IvBUPbnR');
        $customer = \Stripe\Customer::create(array(
          'name' => Auth::user()->name,
        //   'description' => 'test description',
          'email' => Auth::user()->email,
          'source' => $request->input('stripeToken'),
        //    "address" => ["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]
            'addres' => Auth::user()->location
      ));
        try {
            \Stripe\Charge::create ( array (
                    // "amount" => 300 * 100,
                    "amount"=>120,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" => "Test payment."
            ) );
            $student = Auth::user()->id;
            $student = Student::where('user_id',$student)->first();

            $payment = new payments();
            $payment->card_holder_name = $request->card_holder_name;
            $payment->amount = 120;
            $payment->currency = 'usd';
            $payment->cvv = $request->cvv;
            $payment->expiration = $request->expiration;
            $payment->year = $request->year;
            // $payment->student = Auth::user()->id;
            $payment->student_id = $student->id;
            $payment->save();

            $student->payment=true;
            $student->save();

            


              // swal("Payment done successfully !");

           session()->flash ( 'success-message', 'Payment done successfully, we will get back to you soon' );
            $chapters = Chapter::all();
            return view('home.home',compact('chapters'))->with('message','Payment done successfully ! we will contact you soon');
            // return view ( 'cardForm' );
        } catch ( \Stripe\Error\Card $e ) {
          session()->flash ( 'fail-message', $e->get_message() );
            // return view ( 'cardForm' );
        }

      // return view ( 'cardForm' );
   
  }
}
