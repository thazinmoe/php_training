<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Contracts\Services\TaskListServiceInterface;



class TodoController extends Controller
{
    /**
     * taskListInterface
     */
    private $taskListInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskListServiceInterface $taskListServiceInterface)
    {
        $this->taskListInterface = $taskListServiceInterface;
    }

    public function index()
    {
        $todos = $this->taskListInterface->getTaskList();
        return view('todo.index')->with(['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $this->taskListInterface->uploadTaskList($request);
        return redirect()->back()->with('success', "TODO created successfully!");
    }

    public function edit($id)
    {
        $todo = $this->taskListInterface->editTaskList($id);
        return view('todo.edit')->with(['id' => $id, 'todo' => $todo]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $this->taskListInterface->updateTaskList($request);
        return redirect('/index')->with('success', "TODO updated successfully!");
    }

    public function completed($id)
    {
        $todo = $this->taskListInterface->completeTaskList($id);
        if ($todo->completed) {
            $todo->update(['completed' => false]);
            return redirect()->back()->with('success', "TODO marked as incomplete!");
        } else {
            $todo->update(['completed' => true]);
            return redirect()->back()->with('success', "TODO marked as complete!");
        }
    }

    public function delete($id)
    {
        $todo = $this->taskListInterface->deleteTaskList($id);
        $todo->delete();
        return redirect()->back()->with('success', "TODO deleted successfully!");
    }
}
