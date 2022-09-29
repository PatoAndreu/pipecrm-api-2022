<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return AnonymousResourceCollection
	 */
	public function index(): AnonymousResourceCollection
	{
		$this->markDelayed();
		return TaskResource::collection(
			Task::orderBy('date', 'desc')
							->get()
		);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param $contact
	 * @return AnonymousResourceCollection
	 */
	public function byContact($contact): AnonymousResourceCollection
	{
		$this->markDelayed();
		return TaskResource::collection(
			Task::where('contact_id', $contact)
							->orderBy('date', 'asc')
							->orderBy('time', 'asc')
							->get()
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreTaskRequest $request
	 * @return JsonResponse
	 */
	public function store(StoreTaskRequest $request): JsonResponse
	{
		$result = Task::create($request->validated());

		return response()->json([
															'data'     => new TaskResource($result),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Task $task
	 * @return TaskResource
	 */
	public function show(Task $task): TaskResource
	{
		return new TaskResource($task);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateTaskRequest $request
	 * @param Task $task
	 * @return JsonResponse
	 */
	public function update(UpdateTaskRequest $request, Task $task): JsonResponse
	{
		$task->update($request->validated());
		return response()->json([
															'data'     => new TaskResource($task),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Task $task
	 * @return JsonResponse
	 */
	public function destroy(Task $task): JsonResponse
	{
		$task->delete();
		return response()->json([
															'data'     => null,
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	private function markDelayed()
	{
		$now = Carbon::now()->format('Y-m-d H:i:s');
		Task::select(['id', 'date', 'time', 'delayed'])->where('completed', '!=', true)->get()->map(function ($task) use ($now) {
			$date = Carbon::parse($task->date . ' ' . $task->time)->format('Y-m-d H:i:s');
			$task['delayed'] = false;
			if ($date < $now) {
//				 echo $task['id'].' - '.$date .' - '.$now. '<br>';
				$task['delayed'] = true;
			}
			$task->save();
		});

	}
}
