<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\System\RegisterRequest;
use App\Models\Credentials\People;
use App\Models\Credentials\User;
use Illuminate\Support\Facades\Mail;
use Styde\Html\Facades\Alert;

class RegisterController extends Controller
{
    /**
     * Create a new account controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        // transform all data received to capital letter
        $collection = Helper::convert_to_uppercase($request->all());

        // create record personal information
        $people = People::create($collection->all());

        // Get password
        $password = $request->input('password');

        // build data access credentials
        $credentials = [

            'full_name'    => $collection['first_name'] . ' ' .$collection['last_name'],

            'email'        => $collection['email'],

            'password'     => bcrypt($password),

            'people_id'    => $people->id,

            'profile_id'   => 2,

            'reception_id' => 1,
        ];

        // create log access credentials
        $client = User::create($credentials);

        // send email to the customer with your credentials
        $this->send_mail($people->full_name, $client->email, $password);

        Alert::message(trans('messages.client.account'), 'success');

        return $this->redirectDefault();
    }

    /**
     * send mail to client
     * @param string $name
     * @param string $email
     * @param string $password
     */
    private function send_mail($name, $email, $password)
    {
        Mail::send('emails.credentials', compact('name', 'email', 'password'), function ($message) use ($email) {

            $message->to($email)->subject(trans('front.email.subject_credentials'));

        });
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectDefault()
    {
        return redirect()->route('auth');
    }
}
