<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LinkedSocialAccount;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Cart_details;
class SocialAccountController extends Controller
{
   /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(\App\Providers\SocialAccountService $accountService, $provider)
    {

        try {
            $user = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'something went wrong. please try again.');
        }

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        auth()->login($authUser, true);
		
		
		if (Auth::check()) {				
			if(session()->get('cart')){
				Cart::updateOrCreate(
				['id' =>session()->get('cart')],			
				[
				'user_id' => Auth::user()->id,
				'session_id' => Auth::user()->id,
				]
				);	
			}
		}

       return redirect()->to('/')->with('message', "Successfully logged in.");
    }
}
