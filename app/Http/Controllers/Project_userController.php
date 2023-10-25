<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProject_userRequest;
use App\Http\Requests\UpdateProject_userRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Project_user;
use App\Repositories\Project_userRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class Project_userController extends AppBaseController
{
    
    /** @var Project_userRepository $projectUserRepository*/
    private $projectUserRepository;

    public function __construct(Project_userRepository $projectUserRepo)
    {
        $this->projectUserRepository = $projectUserRepo;
    }

    /**
     * Display a listing of the Project_user.
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('teams')){
            $projectUsers = Project_user::where('users_id', Auth::user()->id)->paginate(10);
        }elseif(Auth::user()->hasRole('project-management')){

            $projectUsers = Project_user::whereHas('projects',function($query){
                $query->where('owner_id', Auth::user()->id);
            })->paginate(10);
        }
        $roleUser = Auth::user()->roles;

        return view('project_users.index')
            ->with('projectUsers', $projectUsers);
    }

    /**
     * Show the form for creating a new Project_user.
     */
    public function create()
    {
        return view('project_users.create');
    }

    /**
     * Store a newly created Project_user in storage.
     */
    public function store(CreateProject_userRequest $request)
    {
        $input = $request->all();

        $projectUser = $this->projectUserRepository->create($input);

        Flash::success('Project User saved successfully.');

        return redirect(route('projectUsers.index'));
    }

    /**
     * Display the specified Project_user.
     */
    public function show($id)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projectUsers.index'));
        }

        return view('project_users.show')->with('projectUser', $projectUser);
    }

    /**
     * Show the form for editing the specified Project_user.
     */
    public function edit($id)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projectUsers.index'));
        }

        return view('project_users.edit')->with('projectUser', $projectUser);
    }

    /**
     * Update the specified Project_user in storage.
     */
    public function update($id, UpdateProject_userRequest $request)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projectUsers.index'));
        }

        $projectUser = $this->projectUserRepository->update($request->all(), $id);

        Flash::success('Project User updated successfully.');

        return redirect(route('projectUsers.index'));
    }

    /**
     * Remove the specified Project_user from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $projectUser = $this->projectUserRepository->find($id);

        if (empty($projectUser)) {
            Flash::error('Project User not found');

            return redirect(route('projectUsers.index'));
        }

        $this->projectUserRepository->delete($id);

        Flash::success('Project User deleted successfully.');

        return redirect(route('projectUsers.index'));
    }
}
