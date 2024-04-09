<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Hydrat\Laravel2FA\TwoFactorAuth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
     
        $request->authenticate();
        $user = $request->user();

        if (auth()->check() && (auth()->user()->userStatus == 'Archived')) {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return Redirect::back()->with('error', 'Sorry, Account has been Archived.');
        } else {  
            $request->session()->regenerate();
            
            if (auth()->check() && (auth()->user()->userLevel == 'User')){
                return redirect()->intended(RouteServiceProvider::HOME);
            }else{
                return $this->authenticated($request, $user);
            }
            
        
        }
    }

    protected function authenticated(Request $request, $user)
    {
        # Trigger 2FA if necessary.
        if (TwoFactorAuth::getDriver()->mustTrigger($request, $user)) {
            return TwoFactorAuth::getDriver()->trigger($request, $user);
        }

        # If not, do the usual job.
        return redirect()->intended(RouteServiceProvider::HOME);

        // return TwoFactorAuth::getDriver()->trigger($request, $user);
    }  




    /** 
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
