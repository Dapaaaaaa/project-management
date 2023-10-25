<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Project;
use App\Models\Project_status;
use App\Models\Project_user;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProjectController extends AppBaseController
{
    /** @var ProjectRepository $projectRepository*/
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     */
    public function index(Request $request)
    {
        $projectManager = User::role('project-management')->get();
        $status = Project_status::all();
        $projects = $this->projectRepository->paginate(10);

        return view('projects.index', compact('projectManager', 'status'))
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new Project.
     */
    public function create()
    {
        $userTeams = User::whereHas('roles',function($query){
            $query->where('name','teams');
        } )->get();

        $team =[];
        $status = Project_status::all();
        return view('projects.create', compact('userTeams', 'status','team'));
    }

    /**
     * Store a newly created Project in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();
        $input['owner_id'] = Auth::user()->id;
        try{
            DB::beginTransaction();
            $project = Project::create($input);

            foreach($input['team'] as $item){
                $projectUser = Project_user::create([
                    'users_id'=> $item,
                    'projects_id'=>$project->id
                ]);
                $projectUser->save();
            };

            DB::commit();
            Flash::success('Project saved successfully.');

        }catch(Exception $exception){
            DB::rollback();
            Flash::error('Project saved failed. Error:'.$exception->getMessage());
        }
        return redirect(route('projects.index'));
    }

    /**
     * Display the specified Project.
     */
    public function show($id)
    {
        $projectManager = User::role('project-management')->get();
        $status = Project_status::all();
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.show', compact('projectManager', 'status'))->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     */
    public function edit($id)
    {
        $projectManager = User::role('project-management')->get();
        $status = Project_status::all();
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        return view('projects.edit', compact('projectManager', 'status'))->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
