<?php
	Class AuthController extends BaseController{
		

		public function getLogin(){
			return View::make('login');
		}

		public function postLogin(){
			$rules = array('email' => 'required', 'password' => 'required');
			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails())
			{
				return Redirect::route('login')->withErrors( $validator);
			}

			$auth = Auth::attempt(array(
					'email' => Input:: get('email'),
					'password' => Input::get('password')
				), false);

			if(!$auth)
			{
				return Redirect::route('login')->with( 'errors', array(
						'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw'
					));
			}

			return Redirect::route('Home')->with('successes', array('aanmelden gelukt'));
		}

		public function getRegister()
		{
			return View::make('register');
		}

		public function postRegister()
		{
			$rules = array(
					'email'		=> 'required|email'
				, 	'password' 	=> 'required|min:8'
				);
			$validator = Validator::make(Input::all(), $rules);
			Session::flash('email', Input::get('email'));
			if ($validator->fails())
			{
				//var_dump($validator);
				return Redirect::route('register')->withErrors($validator);
			}

			$user 				= 	new user;
			$user->email 		= 	Input::get('email');
			$user->password 	=	Hash::make(Input::get('password'));
			$user->save();

			Auth::attempt(array(
				'email'		=>	Input::get('email'),
				'password' 	=>	Input::get('password')
				));

			return Redirect::route('Home')->with('successes', array('Registreren gelukt'));

		}

		public function logout()
		{
			Auth::logout();

			return Redirect::route('login')->with('successes', array('afmelden gelukt'));
		}


	}



?>