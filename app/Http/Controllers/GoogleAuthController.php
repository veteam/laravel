<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;

class GoogleAuthController extends Controller
{
    public function redirect () {
        // phpinfo();
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        
        $google_user = Socialite::driver('google')->user();
            // echo ($google_user); exit;
        try{
            // echo ("toto");
            $google_user = Socialite::driver('google')->user();
            // echo ($google_user);
            $user=User::where('google_id', $google_user->getId())->first();
            echo($user);
            if (!$user){
                echo ("toto1");
                $new_user=User::create([
                    'name'=>$google_user->getName(),
                    'email'=>$google_user->getEmail(),
                    'google_id'=>$google_user->getId(),
                ]);
                
                // Auth::login($new_user);

                return redirect()->intended('dashboard');

            }
            else{
                echo ("toto2");
                // Auth::login($user);
                return redirect()->intended('dashboard');
            }
        }
        catch(\Throwable $th) {
            // echo $th;
            return "that's a big pile of shite";
        }
    }

}
