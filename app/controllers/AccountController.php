<?php

class AccountController extends \BaseController{

  /**
   * Display a login form
   *
   * @return Response
   */
  public function getLogin()
  {
      if (Auth::check())
      {
          return Redirect::to('/');
      }

      $invalidLogin = Session::get('message');
      return View::make('account.login')->with('invalidLogin', $invalidLogin);
  }

/**
   * Do the login dance
   *
   * @return Response
   */
  public function postLogin()
  {
      if (Auth::check())
      {
          return Redirect::to('/');
      }

      $rules = array(
          'email'    => 'required|email',
          'password' => 'required'
      );

      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('account/login')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {

          $userdata = array(
              'email'   => Input::get('email'),
              'password'  => Input::get('password')
          );

          $redirectURl = (Input::get('redirect') == '') ? '/' : urldecode(Input::get('redirect'));

          if (Auth::attempt($userdata)) {
              return Redirect::to($redirectURl);
          } else {
              // validation not successful, send back to form
              return Redirect::to('account/login')->with('message', Lang::get('users.loginFailed'));;
          }

      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getSignup()
    {
      if (Auth::check())
      {
          return Redirect::to('/');
      }
      return View::make('account.signup');
    }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function postSignup()
  {
      $rules = array(
          'email'    => 'required|email|unique:users',
          'first_name'    => 'required',
          'last_name'     => 'required',
          'password' => 'required|min:8|confirmed'
      );

      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
        return Redirect::to('account/signup')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
      } else {

        $userdata = array(
            'email'   => Input::get('email'),
            'first_name'      => Input::get('first_name'),
            'last_name'      => Input::get('last_name'),
            'password'  => Input::get('password')
        );

        $user = User::create($userdata);
        $user->password = Hash::make($userdata['password']);
        $user->save();

        Auth::loginUsingId($user->id);
        return Redirect::to('/');
      }
  }

  public function getLoginWithTwitter() {

    // get data from input
    $token = Input::get( 'oauth_token' );
    $verify = Input::get( 'oauth_verifier' );

    // get twitter service
    $tw = OAuth::consumer( 'Twitter' );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $token ) && !empty( $verify ) ) {

        // This was a callback request from twitter, get the token
        $token = $tw->requestAccessToken( $token, $verify );
        session_write_close();

        // Send a request with it
        $result = json_decode( $tw->request( 'account/verify_credentials.json' ), true );

        // split name into first and last
        $nameParts = explode(" ", $result['name']);
        $last_name = array_pop($nameParts);
        $first_name = implode(" ", $nameParts);

        // create user or get existing
        $user = User::firstOrCreate(array(
          'social_id' => $result['id'],
          'social_type' => 1
        ));
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->avatar_url = $result['profile_image_url'];
        $user->oauth_token = $token->getRequestToken();
        $user->oauth_token_secret = $token->getRequestTokenSecret();

        // save to database
        $user->save();
        // log user in
        Auth::loginUsingId($user->id);
        $redirectURl = (Input::get('redirect') == '') ? '/' : urldecode(Input::get('redirect'));
        return Redirect::to($redirectURl);

    }
    // if not ask for permission first
    else {
        // get request token
        $reqToken = $tw->requestRequestToken();

        // get Authorization Uri sending the request token
        $url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

        // return to twitter login url
        return Redirect::to( (string)$url );
    }
  }

  /**
   * Login user with facebook
   *
   * @return void
 */

  public function getLoginWithFacebook() {

    // get data from input
    $code = Input::get( 'code' );

    // get fb service
    $fb = OAuth::consumer( 'Facebook' );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $code ) ) {

        // This was a callback request from facebook, get the token
        $token = $fb->requestAccessToken( $code );

        // Send a request with it
        $result = json_decode( $fb->request( '/me' ), true );

        // create user or get existing
        $user = User::firstOrCreate(array(
          'social_id' => $result['id'],
          'social_type' => 2
        ));
        $user->first_name = $result['first_name'];
        $user->last_name = $result['last_name'];
        $user->email = $result['email'];
        $user->avatar_url = 'http://graph.facebook.com/'.$result['id'].'/picture?type=square&width=150';
        $user->oauth_token = $token->getAccessToken();
        // save to database
        $user->save();
        // log user in
        Auth::loginUsingId($user->id);
        $redirectURl = (Input::get('redirect') == '') ? '/' : urldecode(Input::get('redirect'));
        return Redirect::to($redirectURl);

    }
    // if not ask for permission first
    else {
        // get fb authorization
        $url = $fb->getAuthorizationUri();

        // return to facebook login url
         return Redirect::to( (string)$url );
    }
  }

  public function getLogout()
  {
      Auth::logout();
      return Redirect::to('/');
  }

}