<?php namespace App\Http\Controllers;

use App\Lead;
use App\Http\Requests;
use App\Http\Requests\CreateLeadRequest;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;


class LeadsController extends Controller {

	//

	public function index()
	{
		$leads = Lead::all();		
		//dd(Request::server('HTTP_REFERER'));
		return $leads;
	}

	public function create()
	{
		return view('leads.create');
	}

	public function store(CreateLeadRequest $request)
	{
		$input = Request::all();

		Lead::create($input);

		return redirect('leads');
	}

}
