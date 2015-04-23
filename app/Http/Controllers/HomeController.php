<?php namespace App\Http\Controllers;

use Auth;
use App\Project;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		//Flash::message('Thanks for signing up! Please check your email.');
        //dd(User::find(1)->projects);


        if (Auth::check()) {

            $projects = Auth::user()->projects();

            // Create sample Project and sample Experiments
            if (!$projects->count())
            {
                ProjectController::getCreateSampleProject();
            }


            if ($projects->count())
            {
                return redirect('projects');
            }
            else
            {
                return view('home.dashboard');
            }
        }
        else {
            return view('home.index');
        }
	}

}
