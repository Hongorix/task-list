<?php

use App\Http\Requests\TaskRequest;
use \App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(10);

    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/tasks/task-{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/task-{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/task-{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/task-{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', "Task: {$task->title} - deleted successfully!");
})->name('tasks.destroy');

Route::put('/tasks/task-{task}/toggle', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');

























// use Illuminate\Http\Request;
// Route::post('/tasks', function (TaskRequest $request) {
//     // $data = $request->validated();
//     // $task = new Task;
//     // $task->title = $data['title'];
//     // $task->description = $data['description'];
//     // $task->long_description = $data['long_description'];
//     // $task->save();

//     return redirect()->route('tasks.show', ['id' => $task->id])
//         ->with('success', 'Task created successfully!');
// })->name('tasks.store');

// Route::put('/tasks/task-{task}', function (Task $task, TaskRequest $request) {
//     // $data = $request->validated();
//     // $task->title = $data['title'];
//     // $task->description = $data['description'];
//     // $task->long_description = $data['long_description'];
//     // $task->save();

//     return redirect()->route('tasks.show', ['task' => $task->id])
//         ->with('success', 'Task updated successfully!');
// })->name('tasks.update');


// use Illuminate\Http\Response;

// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

// Route::get('/tasks', function () use ($tasks) {
//     return view('index', [
//         'tasks' => $tasks
//     ]);
// })->name('tasks.index');

// Route::get('/tasks/task-{id}', function ($id) use ($tasks) {
//     $task = collect($tasks)->firstWhere('id', $id);

//     if (!$task) {
//         abort(Response::HTTP_NOT_FOUND);
//     };

//     return view('show', ['task' => $task]);
// })->name('tasks.show');







// Route::get("/hello", function () {
//     return redirect()->route('name1');
//     // return redirect('/');
// });

// Route::get("/greet/{name}", function ($name) {
//     return "Hello {$name}!";
// });

// Route::fallback(function () {
//     return "no page";
// });
