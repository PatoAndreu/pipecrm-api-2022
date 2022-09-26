<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\StoreActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ActivityController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return AnonymousResourceCollection
	 */
	public function index(): AnonymousResourceCollection
	{
		$this->markDelayed();
		return ActivityResource::collection(
			Activity::orderBy('date', 'desc')
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
		return ActivityResource::collection(
			Activity::where('contact_id', $contact)
							->get()
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreActivityRequest $request
	 * @return JsonResponse
	 */
	public function store(StoreActivityRequest $request): JsonResponse
	{
		$result = Activity::create($request->validated());

		return response()->json([
															'data'     => new ActivityResource($result),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Activity $activity
	 * @return ActivityResource
	 */
	public function show(Activity $activity): ActivityResource
	{
		return new ActivityResource($activity);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateActivityRequest $request
	 * @param Activity $activity
	 * @return JsonResponse
	 */
	public function update(UpdateActivityRequest $request, Activity $activity): JsonResponse
	{
		$activity->update($request->validated());
		return response()->json([
															'data'     => new ActivityResource($activity),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Activity $activity
	 * @return JsonResponse
	 */
	public function destroy(Activity $activity): JsonResponse
	{
		$activity->delete();
		return response()->json([
															'data'     => null,
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	private function markDelayed()
	{
		$now = Carbon::now()->format('Y-m-d H:i:s');
		 Activity::select(['id','date', 'time','delayed'])->where('type','!=','note')->where('completed','!=',true)->get()->map(function ($activity) use ($now) {
			$date = Carbon::parse($activity->date.' '.$activity->time)->format('Y-m-d H:i:s');
			 if($date < $now){
//				 echo $activity['id'].' - '.$date .' - '.$now. '<br>';
				 $activity['delayed'] = true;
				 $activity->save();
			 }
		});

	}
}
