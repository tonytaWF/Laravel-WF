<?php namespace App\Http\Controllers;

use App\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PhaseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function postUpload()
    {
        $input = \Request::all();

        //TODO: validate files

        $file = $input['file'];
        $destinationPath = 'uploads';

        $ext = $file->guessClientExtension();

        // Client file name, including the extension of the client
        $fullname = $file->getClientOriginalName();

        $hashname = date('H.i.s').'-'.md5($fullname).'.'.$ext;
        $upload_success = $file->move($destinationPath, $hashname);

        $files = new File;
        $files->filename = $hashname;
        $files->phase_id = $input['phase_id'];
        $files->save();

        if( $upload_success ) {
            return \Response::json('success', 200);
        } else {
            return \Response::json('error', 400);
        }
    }


}
