<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodo_statusRequest;
use App\Http\Requests\UpdateTodo_statusRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Todo_statusRepository;
use Illuminate\Http\Request;
use Flash;

class Todo_statusController extends AppBaseController
{
    /** @var Todo_statusRepository $todoStatusRepository*/
    private $todoStatusRepository;

    public function __construct(Todo_statusRepository $todoStatusRepo)
    {
        $this->todoStatusRepository = $todoStatusRepo;
    }

    /**
     * Display a listing of the Todo_status.
     */
    public function index(Request $request)
    {
        $todoStatuses = $this->todoStatusRepository->paginate(10);

        return view('todo_statuses.index')
            ->with('todoStatuses', $todoStatuses);
    }

    /**
     * Show the form for creating a new Todo_status.
     */
    public function create()
    {
        return view('todo_statuses.create');
    }

    /**
     * Store a newly created Todo_status in storage.
     */
    public function store(CreateTodo_statusRequest $request)
    {
        $input = $request->all();

        $todoStatus = $this->todoStatusRepository->create($input);

        Flash::success('Todo Status saved successfully.');

        return redirect(route('todoStatuses.index'));
    }

    /**
     * Display the specified Todo_status.
     */
    public function show($id)
    {
        $todoStatus = $this->todoStatusRepository->find($id);

        if (empty($todoStatus)) {
            Flash::error('Todo Status not found');

            return redirect(route('todoStatuses.index'));
        }

        return view('todo_statuses.show')->with('todoStatus', $todoStatus);
    }

    /**
     * Show the form for editing the specified Todo_status.
     */
    public function edit($id)
    {
        $todoStatus = $this->todoStatusRepository->find($id);

        if (empty($todoStatus)) {
            Flash::error('Todo Status not found');

            return redirect(route('todoStatuses.index'));
        }

        return view('todo_statuses.edit')->with('todoStatus', $todoStatus);
    }

    /**
     * Update the specified Todo_status in storage.
     */
    public function update($id, UpdateTodo_statusRequest $request)
    {
        $todoStatus = $this->todoStatusRepository->find($id);

        if (empty($todoStatus)) {
            Flash::error('Todo Status not found');

            return redirect(route('todoStatuses.index'));
        }

        $todoStatus = $this->todoStatusRepository->update($request->all(), $id);

        Flash::success('Todo Status updated successfully.');

        return redirect(route('todoStatuses.index'));
    }

    /**
     * Remove the specified Todo_status from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $todoStatus = $this->todoStatusRepository->find($id);

        if (empty($todoStatus)) {
            Flash::error('Todo Status not found');

            return redirect(route('todoStatuses.index'));
        }

        $this->todoStatusRepository->delete($id);

        Flash::success('Todo Status deleted successfully.');

        return redirect(route('todoStatuses.index'));
    }
}
