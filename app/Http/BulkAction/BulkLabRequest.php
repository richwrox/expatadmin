<?php
namespace App\Http\BulkAction;


use App\Models\InstitutionUser;
use App\Models\Patient;
use App\Core\MakesApiRequest;
use App\Models\LabRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class BulkLabRequest 
{
	
	public function bookLabs($usersCollection,$testDate,$timeOfTest,$sampleLocation,$labBundleItems,$invoiceId,$amount,$cart){
		$now = Carbon::now();
        $code = md5($now);
        

        

		for($x=0; $x < count($usersCollection); $x++):
			//Find user details
			$user =  Patient::where('token', $usersCollection[$x])->first();
			$patientFullName = $user->first_name. ' '. $user->last_name;
			
            $key = mt_rand();
            $testKey = implode('-', str_split(substr(strtolower(md5(microtime().$key)), 0, 16), 8));

            $this->insertRequest($user->token,$patientFullName,$user->token,$now,$labBundleItems,$sampleLocation,$testDate,$timeOfTest,$user->phone,
            	$invoiceId,$amount,$user->email,\Session::get('partnerToken'),$user->gender,$testKey,$cart);
		endfor;
		return 200;
	}


	public function insertRequest($patientToken,$requestedBy,$requesterToken,$now,$labBundleItems,$sampleLocation,$testDate,$timeOfTest,$contact,$invoiceId,$amount,$email,$authUser,$gender,$testKey,$cart){
		$lab = new LabRequest();
		$lab->patient_token       = $patientToken;
        $lab->requested_by        = $requestedBy;
        $lab->requester_token     = $requesterToken;
        $lab->consultation_id     = '';
        $lab->request_date        = $now;
        $lab->lab_details         = $labBundleItems;
        $lab->lab_type            = 'Bundled lab';
        $lab->status              = 'new';
        $lab->service_provider    = '';
        $lab->facilitator         = 'HealthNeutron';
        $lab->created_at          = $now;
        $lab->updated_at          = $now;
        $lab->completed           = 'no';
        $lab->sample_picked       = 'Pending';
        $lab->smaple_location     = $sampleLocation;
        $lab->test_date           = $testDate;
        $lab->time_of_test        = $timeOfTest;
        $lab->landmark            = '';
        $lab->contact             = $contact;
        $lab->invoice_id          = $invoiceId;
        $lab->amount              = $amount;
        $lab->discount            = 0;
        $lab->request_type        = 'Partner';
        $lab->extra_email         = $email;
        $lab->auth_user           = \Session::get('partnerToken');
        $lab->partner_token       = \Session::get('partnerToken');
        $lab->extra_gender        = $gender;
        $lab->test_key            = $testKey;
        $cartItems                = $cart;

        try{
        	DB::beginTransaction();
		        $lab->save();

		        if($cart != null || $cart != ''){
		                
		                foreach($cartItems as $item){
		                    //Insert cart item
		                    DB::table('cart_items')->insert(['product_id' => $item['id'], 'test_key'=>$testKey, 'invoice_id' => $invoiceId]);
		                }
		        }
		        DB::commit();
		    }catch(\Exception $e){
		    	DB::rollback();
            	return 500;
		    }

	}

}