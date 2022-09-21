<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\StoreActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
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
		return ActivityResource::collection(
			Activity::orderBy('created_at', 'desc')
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
}
