<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateLeadRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// Only allow logged in users
        // return \Auth::check();
        // Allows all users in
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email' => 'required|email|unique:leads,email|max:60'
			//
		];
	}

}
