<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProject_statusRequest;
use App\Http\Requests\UpdateProject_statusRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Project_statusRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class Project_statusController extends AppBaseController
{
    /** @var Project_statusRepository $projectStatusRepository*/
    private $projectStatusRepository;

    public function __construct(Project_statusRepository $projectStatusRepo)
    {
        $this->projectStatusRepository = $projectStatusRepo;
    }

    /**
     * Display a listing of the Project_status.
     */
    public function index(Request $request)
    {
        $projectStatuses = $this->projectStatusRepository->paginate(10);

        return view('project_statuses.index')
            ->with('projectStatuses', $projectStatuses);
    }

    /**
     * Show the form for creating a new Project_status.
     */
    public function create()
    {
        return view('project_statuses.create');
    }

    /**
     * Store a newly created Project_status in storage.
     */
    public function store(CreateProject_statusRequest $request)
    {
        $input = $request->all();

        $projectStatus = $this->projectStatusRepository->create($input);

        Flash::success('Project Status saved successfully.');

        return redirect(route('projectStatuses.index'));
    }

    /**
     * Display the specified Project_status.
     */
    public function show($id)
    {
        $projectStatus = $this->projectStatusRepository->find($id);

        if (empty($projectStatus)) {
            Flash::error('Project Status not found');

            return redirect(route('projectStatuses.index'));
        }

        return view('project_statuses.show')->with('projectStatus', $projectStatus);
    }

    /**
     * Show the form for editing the specified Project_status.
     */
    public function edit($id)
    {
        $projectStatus = $this->projectStatusRepository->find($id);

        if (empty($projectStatus)) {
            Flash::error('Project Status not found');

            return redirect(route('projectStatuses.index'));
        }

        return view('project_statuses.edit')->with('projectStatus', $projectStatus);
    }

    /**
     * Update the specified Project_status in storage.
     */
    public function update($id, UpdateProject_statusRequest $request)
    {
        $projectStatus = $this->projectStatusRepository->find($id);

        if (empty($projectStatus)) {
            Flash::error('Project Status not found');

            return redirect(route('projectStatuses.index'));
        }

        $projectStatus = $this->projectStatusRepository->update($request->all(), $id);

        Flash::success('Project Status updated successfully.');

        return redirect(route('projectStatuses.index'));
    }

    /**
     * Remove the specified Project_status from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $projectStatus = $this->projectStatusRepository->find($id);

        if (empty($projectStatus)) {
            Flash::error('Project Status not found');

            return redirect(route('projectStatuses.index'));
        }

        $this->projectStatusRepository->delete($id);

        Flash::success('Project Status deleted successfully.');

        return redirect(route('projectStatuses.index'));
    }
}
