<?php

namespace App\Http\Controllers\Auth;

use App\Models\AuthData;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;

class VkController extends Controller
{
   public function login()
   {
	   return Socialite::with('vkontakte')->redirect();
   }

   public function response()
   {
	   $user = Socialite::driver('vkontakte')->user();
	   $email = $user->getEmail();
	   $status = false;

	   $InternalUser = User::where('email', $email)->first();

	   $objAuth = new AuthData();
	   $check = $objAuth->where('user_id', $InternalUser->id)->where('network', 'vk')->first();
	   if($check) {
	   	  $check->nickname = $user->getNickname();
	   	  $check->name     = $user->getName();
	   	  $check->avatar   = $user->getAvatar();
	   	  $status = $check->save();
	   }
	   else {
	   	  $status = (bool)$objAuth->create([
	   	  	  'user_id' => $InternalUser->id,
			  'network' => "vk",
			  'nickname' => $user->getNickname(),
			  'name'  => $user->getName(),
			  'avatar' => $user->getAvatar()
		  ]);
	   }

	   if($status) {
	   	   \Auth::login($InternalUser);
	   	   return redirect()->route('home');
	   }

	   \Log::error("Юзер не смог зарегатца");
	   dd("Юзер не смог зарегатца");
   }
}