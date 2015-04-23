<?php namespace App\Http\Controllers;

use App\User;
use App\Experiment;
use App\Project;
use App\Phase;
use App\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Request;

class ExperimentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $project_id = \Request::segment(2);
        $project = Project::find($project_id);
        $experiments = Experiment::where('project_id', $project_id)->get();

		return view('experiments.index',compact('project', 'experiments'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $project_id = \Request::segment(2);
		return view('experiments.create', compact('project_id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = \Request::all();
        $phases = ['Strategy', 'Design', 'Development', 'QA', 'Results'];
        $experiment = Experiment::create($input);

        foreach($phases as $phase) {
            Phase::create(['experiment_id' => $experiment->getKey(), 'name' => $phase]);
        }

        return redirect('/projects/'.$experiment->project_id.'/experiments');
        //return redirect('projects/{project_id}/experiments', ['project_id' => $experiment->project_id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $experiment_id = \Request::segment(4);
        $experiment = Experiment::find($experiment_id);
        $phases = Phase::where('experiment_id', '=', $experiment_id)->get();
        return view('experiments.show', compact('experiment','phases'));
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

    public function postEditTitle(Request $request) {
        //\Log::error('Something is really going wrong.');
        //dd(Input::except('pk'));
        $id = $request->get('pk');
        $name = $request->get('value');

        $project = Experiment::where('id', $id)->first();
        $project->name = $name;
        $project->save();

        return \Response::json(array('status'=>1, 'experiment_id' => $id));
    }

}
