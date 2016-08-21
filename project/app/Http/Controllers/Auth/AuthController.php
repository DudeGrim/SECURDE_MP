<?php
namespace App\Http\Controllers\Auth;
//use App\User;
use Auth;
use App\Account;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
class AuthController extends Controller
{
  //\Debugbar::disable();
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */

    protected $redirectTo = '/';
    protected $username = 'emailAddress';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     public function register(Request $request)
     {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
              $request, $validator
            );
        }

        $user = $this->create($request->all());

          return redirect(url('login'));



    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:accounts',
            'firstName' => 'required|max:255',
            'middleInitial' => 'required|max:1',
            'lastName' => 'required|max:255',
            'emailAddress' => 'required|email|max:255|unique:accounts',
            'password' => 'required|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
     //if (array_key_exists('accountType' $data)){
        return Account::create([
            'username' => $data['username'],
            'firstName' => $data['firstName'],
            'middleInitial' => $data['middleInitial'],
            'lastName' => $data['lastName'],
            'emailAddress' => $data['emailAddress'],
            'password' => bcrypt($data['password']),
            'accountType' => '1',
        ]);
  
    }
}
