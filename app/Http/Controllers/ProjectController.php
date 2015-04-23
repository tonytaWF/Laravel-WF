<?php namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\User;
use App\Experiment;
use App\Phase;
use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Request;

class ProjectController extends Controller {

    private $project;

    public function __construct(Project $project)
    {
        $this->middleware('auth');
        $this->project = $project;

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $projects = Auth::user()->projects()->get();
        //dd($projects);

        return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProjectRequest $request)
	{
        //$input = Request::all();
        $name = $request->get('name');
        $user = Auth::user();

        //dd($input);
        //dd($user->getKey());

        $project = Project::create(['name' => $request->get('name'), 'active' => 1]);
        $project->users()->attach($user->getkey());

        return redirect('projects');
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

        //$project = $this->project->where('id', $id)->first();
        $project = Auth::user()->projects()->where('id', $id)->get()->first();

        if ($project) {
            $project_status = [
                '0' => 'Archived',
                '1' => 'Active'
            ];
            return view('projects.edit', compact('project', 'project_status'));

        } else {
            return redirect('/');
        }
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $project = $this->project->where('id', $id)->first();
        //dd($project);
        $project->fill(['name' => $request->get('name'), 'active' => $request->get('active')])->save();
        //$this->project->fill($request->input())->save();

        return redirect('projects');

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

        $project = Project::where('id', $id)->first();
        $project->name = $name;
        $project->save();

        return \Response::json(array('status'=>1, 'project_id' => $id));
    }

    public static function getCreateSampleProject() {

        // Create sample project
        $project = Project::create(['name' => 'My Conversion Project', 'active' => 1]);
        $project->users()->attach(Auth::user()->getkey());

        $phases = ['Strategy', 'Design', 'Development', 'QA', 'Results'];

        for ($i = 1; $i <= 4; $i++)
        {
            $experiment = Experiment::create(['name' => 'Sample Experiment #'.$i, 'project_id' => $project->getKey()]);
            foreach($phases as $phase) {
                Phase::create(['experiment_id' => $experiment->getKey(), 'name' => $phase]);
            }
        }

    }
}
