<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'admin';

    //登录成功跳转地址
    protected $redirectTo = 'admin/index';

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout', 'index']]);
    }

    public function index()
    {
        dd(Auth::guard()->user());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);

        }

        $credentials = $this->credentials($request);
        //$admin = $this->checkAdmin($credentials);

        //if ($admin && $admin->status == 0) {
        if ($this->guard()->attempt(array_merge(['status' => 0], $credentials))) {
            //$this->guard()->login($admin, $request->has('remember'));

            // event(new login($request, $this->guard()->user()));
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    protected function credentials($request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * 校验用户
     * @param $credentials
     * @return bool
     */
    protected function checkAdmin($credentials)
    {
        $field = $this->username();
        $admin = Admin::where($field, $credentials[$field])->first();
        
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            //$admin = Admin::findByUser($admin);
            return $admin;
        }

        return false;
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }


    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    /**
     * Log the user out of the application.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin/login');
    }

}