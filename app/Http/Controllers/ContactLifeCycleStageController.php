<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactLifeCycleStageRequest;
use App\Http\Requests\Contact\UpdateContactLifeCycleStageRequest;
use App\Http\Resources\ContactLifeCycleStageResource;
use App\Models\ContactLifeCycleStage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ContactLifeCycleStageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return AnonymousResourceCollection
	 */
  public function index(): AnonymousResourceCollection
	{
		return ContactLifeCycleStageResource::collection(ContactLifeCycleStage::all());
  }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreContactLifeCycleStageRequest $request
	 * @return JsonResponse
	 */
  public function store(StoreContactLifeCycleStageRequest $request): JsonResponse
	{
		$result = ContactLifeCycleStage::create($request->validated());

		return response()->json([
															'data'   => new ContactLifeCycleStageResource($result),
															'status' => 200
														]);
  }

  /**
   * Display the specified resource.
   *
   * @param  ContactLifeCycleStage  $stage
   * @return ContactLifeCycleStageResource
	 */
  public function show(ContactLifeCycleStage $stage): ContactLifeCycleStageResource
	{
    return new ContactLifeCycleStageResource($stage);
  }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateContactLifeCycleStageRequest $request
	 * @param ContactLifeCycleStage $stage
	 * @return JsonResponse
	 */
  public function update(UpdateContactLifeCycleStageRequest $request, ContactLifeCycleStage $stage): JsonResponse
	{
		$stage->update($request->validated());
		return response()->json([
															'data'   => new ContactLifeCycleStageResource($stage),
															'status' => 200
														]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  ContactLifeCycleStage  $stage
   * @return JsonResponse
	 */
  public function destroy(ContactLifeCycleStage $stage): JsonResponse
	{
		$stage->delete();

		return response()->json([
															'data'   => new ContactLifeCycleStageResource($stage),
															'status' => 200
														]);
  }
}
