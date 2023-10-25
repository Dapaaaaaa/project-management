<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TodoRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Models\Project;
use App\Models\Todo_status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TodoController extends AppBaseController
{
    /** @var TodoRepository $todoRepository*/
    private $todoRepository;

    public function __construct(TodoRepository $todoRepo)
    {
        $this->todoRepository = $todoRepo;
    }

    /**
     * Display a listing of the Todo.
     */
    public function index(Request $request)
    {
        $project = Project::all();
        $owner = User::role('project-management')->get();
        $team = User::all();
        $todoStatus = Todo_status::all();
        $todos = $this->todoRepository->paginate(10);

        return view('todos.index', compact('project', 'owner' , 'team', 'todoStatus'))
            ->with('todos', $todos);
    }

    /**
     * Show the form for creating a new Todo.
     */
    public function create()
    {
        $project = Project::all();
        $owner = User::role('project-management')->get();
        $team = Auth::user();
        $todoStatus = Todo_status::all();
        return view('todos.create', compact('project', 'owner' , 'team', 'todoStatus'));
    }

    /**
     * Store a newly created Todo in storage.
     */
    public function store(CreateTodoRequest $request)
    {
        $input = $request->all();

        $todo = $this->todoRepository->create($input);

        Flash::success('Todo saved successfully.');

        return redirect(route('todos.index'));
    }

    /**
     * Display the specified Todo.
     */
    public function show($id)
    {
        $project = Project::all();
        $owner = User::role('project-management')->get();
        $team = User::role('teams')->where('id', '!=', auth()->id())->get();
        $todoStatus = Todo_status::all();
        $todo = $this->todoRepository->find($id);

        if (empty($todo)) {
            Flash::error('Todo not found');

            return redirect(route('todos.index'));
        }

        return view('todos.show', compact('project', 'owner' , 'team', 'todoStatus'))->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified Todo.
     */
    public function edit($id)
    {
        $project = Project::all();
        $owner = User::role('project-management')->get();
        $team = Auth::check() ? [Auth::user()] : User::all();
        $todoStatus = Todo_status::all();
        $todo = $this->todoRepository->find($id);

        if (empty($todo)) {
            Flash::error('Todo not found');

            return redirect(route('todos.index'));
        }

        return view('todos.edit', compact('project', 'owner', 'todoStatus'))->with('todo', $todo);
    }

    /**
     * Update the specified Todo in storage.
     */
    public function update($id, UpdateTodoRequest $request)
    {
        $todo = $this->todoRepository->find($id);

        if (empty($todo)) {
            Flash::error('Todo not found');

            return redirect(route('todos.index'));
        }

        $todo = $this->todoRepository->update($request->all(), $id);

        Flash::success('Todo updated successfully.');

        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified Todo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $todo = $this->todoRepository->find($id);

        if (empty($todo)) {
            Flash::error('Todo not found');

            return redirect(route('todos.index'));
        }

        $this->todoRepository->delete($id);

        Flash::success('Todo deleted successfully.');

        return redirect(route('todos.index'));
    }
}
