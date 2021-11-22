<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\TokenStore\TokenCache;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Core\MakesApiRequest;

class AuthController extends Controller
{
  public function signin()
  {
    // Initialize the OAuth client
    $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
      'clientId'                => config('azure.appId'),
      'clientSecret'            => config('azure.appSecret'),
      'redirectUri'             => config('azure.redirectUri'),
      'urlAuthorize'            => config('azure.authority').config('azure.authorizeEndpoint'),
      'urlAccessToken'          => config('azure.authority').config('azure.tokenEndpoint'),
      'urlResourceOwnerDetails' => '',
      'scopes'                  => config('azure.scopes')
    ]);

    $authUrl = $oauthClient->getAuthorizationUrl();

    // Save client state so we can validate in callback
    session(['oauthState' => $oauthClient->getState()]);

    // Redirect to AAD signin page
    return redirect()->away($authUrl);
  }

  public function openIdConnect(){
    //Login user
    $accessToken = $this->getAccessToken();
    dd($accessToken);
  }

  public function callback(Request $request)
  {


    // Validate state
    $expectedState = session('oauthState');
    $request->session()->forget('oauthState');
    $providedState = $request->query('state');
   
    if (!isset($expectedState)) {
      // If there is no expected state in the session,
      // do nothing and redirect to the home page.
      return redirect('/');
    	
    }
    

    if (!isset($providedState) || $expectedState != $providedState) {
      return redirect('/')
        ->with('error', 'Invalid auth state')
        ->with('errorDetail', 'The provided auth state did not match the expected value');
    }

    // Authorization code should be in the "code" query param
    $authCode = $request->query('code');

    if (isset($authCode)) {
      // Initialize the OAuth client

      $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
        'clientId'                => config('azure.appId'),
        'clientSecret'            => config('azure.appSecret'),
        'redirectUri'             => config('azure.redirectUri'),
        'urlAuthorize'            => config('azure.authority').config('azure.authorizeEndpoint'),
        'urlAccessToken'          => config('azure.authority').config('azure.tokenEndpoint'),
        'urlResourceOwnerDetails' => '',
        'scopes'                  => config('azure.scopes')
      ]);
           
      try {
			  // Make the token request
			  $accessToken = $oauthClient->getAccessToken('authorization_code', [
			    'code' => $authCode
			  ]);
             
			  $graph = new Graph();
			  //?$select=displayName,mail,mailboxSettings,userPrincipalName,id,jobTitle
			  $graph->setAccessToken($accessToken->getToken());
              
   		   
              
			  $user = $graph->createRequest('GET', '/me')
			    ->setReturnType(Model\User::class)
			    ->execute();

			  $tokenCache = new TokenCache();
			  
			  //Check if user already exist locally
			  $temp = $this->checkAuthenticatedUser($user);
			  
			  $tokenCache->storeTokens($accessToken, $user);
              
			  return redirect('/user/home');
		  }
	      catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
	        return redirect('/')
	          ->with('error', 'Error requesting access token')
	          ->with('errorDetail', json_encode($e->getResponseBody()));
	      }
    
    }

    // return redirect('/')
    //   ->with('error', $request->query('error'))
    //   ->with('errorDetail', $request->query('error_description'));
  }

  public function create(){
    return view('signup');
  }

  // public function checkAuthenticatedUser($user){
  // 	$nowWithTime = date('Y-m-d H:i:s');
  // 	if(User::where('userid', $user->getId())->exists()){
  // 		//User record is in local db update
  // 		User::where('userid', $user->getId())->update(['name' => $user->getDisplayName(),'email'=>$user->getMail()]);
  // 	}else{
  // 		//Record not get details and save
  // 		User::create([
  // 		   'name'=>$user->getDisplayName(),
  // 		   'email'=>$user->getMail(),
  // 		   'password'=>\Hash::make($user->getId()),
  // 		   'userid'=>$user->getId(),
  // 		   'created_at'=>$nowWithTime
  // 		]);
  		
  // 	}

  // }

  public function signout()
	{
	  $tokenCache = new TokenCache();
	  $tokenCache->clearTokens();
	  return redirect('/');
	}


}