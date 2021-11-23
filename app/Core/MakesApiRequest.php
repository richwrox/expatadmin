<?php
  namespace App\Core;

  use GuzzleHttp\Client;
  use Illuminate\Support\Facades\Http;
  use ArrayAccess;
  use App;


  	trait MakesApiRequest
	{

		public function setBaseUrl(){
	      //$apiBaseUrl = 'http://127.0.0.1:8081';// \config('healthneutron.api_base_url');
	      $apiBaseUrl = 'https://sandbox.healthneutron.com';
	      return $apiBaseUrl;
	    }

	    public function getAccessToken(){
	      $email = 'hnadmin@healneutron.com';
	      $password = 'test8080';

	      $baseUrl = $this->setBaseUrl();
	      $endPoint = $baseUrl.'/api/fetch-token';
	      
	      $client = new Client();

	      $response = $client->request('POST', $endPoint, [
	          'form_params' => [
	              'email' => 'hnadmin@healneutron.com',
	              'password' => 'test8080'
	          ]
	      ]);

	      $responseData = $response->getBody();
	      return json_decode($responseData);
    
    	}


    	public function createBusinessAccount($data){
    		$fetchToken =  $this->getAccessToken();
    		$authToken  =  $fetchToken->data->token;

            $baseUrl = $this->setBaseUrl();
    		$endPoint =  $baseUrl.'/api/v1/add-new-partner';
		    $response = Http::withHeaders([ 'Accept' => 'application/json', 
			'Authorization' => 'Bearer '.$authToken])->post($endPoint, $data);

	 	    $responseData = $response->getBody();
	 	    
	 	    return json_decode($responseData,true);
    		
    	}


    	public function addUser($data){
    		$fetchToken =  $this->getAccessToken();
    		$authToken  =  $fetchToken->data->token;

            $baseUrl = $this->setBaseUrl();
    		$endPoint =  $baseUrl.'/api/v1/add-new-partner-employee';
		    $response = Http::withHeaders([ 'Accept' => 'application/json', 
			'Authorization' => 'Bearer '.$authToken])->post($endPoint, $data);

	 	    $responseData = $response->getBody();
	 	    
	 	    return json_decode($responseData,true);
    	}

    	public function fetchListOfCountries(){
    		
    		$fetchToken =  $this->getAccessToken();
    		$authToken  =  $fetchToken->data->token;

            $baseUrl = $this->setBaseUrl();
    		$endPoint =  $baseUrl.'/api/v1/fetch/countries';
		    $response = Http::withHeaders([ 'Accept' => 'application/json', 
			'Authorization' => 'Bearer '.$authToken])->get($endPoint);

	 	    $responseData = $response->getBody();
	 	    
	 	    return json_decode($responseData,true);
    	}

    	public function addEmployeeAccount($data){
    		$fetchToken =  $this->getAccessToken();
    		$authToken  =  $fetchToken->data->token;
    		
            $baseUrl = $this->setBaseUrl();
    		$endPoint =  $baseUrl.'/api/v1/institution/add-new-employee';
		    $response = Http::withHeaders([ 'Accept' => 'application/json', 
			'Authorization' => 'Bearer '.$authToken])->post($endPoint, $data);
            
	 	    $responseData = $response->getBody();
	 	    
	 	    return json_decode($responseData,true);
    	}

    	public function getInvoiceId($data){
      
        $fetchToken = $this->getAccessToken();
        $authToken  =  $fetchToken->data->token;
            
        $baseUrl    = $this->setBaseUrl();
        $endPoint   =  $baseUrl.'/api/v1/create-invoice';
        $response   = Http::withHeaders([ 'Accept' => 'application/json', 
      'Authorization' => 'Bearer '.$authToken])->post($endPoint, $data);

       $responseData = $response->getBody();
       return json_decode($responseData);
    }

    	public function loginUser($data){
    		$fetchToken =  $this->getAccessToken();
    		$authToken  =  $fetchToken->data->token;

            $baseUrl = $this->setBaseUrl();
    		$endPoint =  $baseUrl.'/api/v1/auth/user/details';
		    $response = Http::withHeaders([ 'Accept' => 'application/json', 
			'Authorization' => 'Bearer '.$authToken])->post($endPoint, $data);

	 	    $responseData = $response->getBody();
	 	    
	 	    return json_decode($responseData,true);
    	}


	}