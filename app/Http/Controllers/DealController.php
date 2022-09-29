<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\StoreDealRequest;
use App\Http\Requests\Deal\UpdateDealRequest;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DealController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return AnonymousResourceCollection
	 */
	public function index(): AnonymousResourceCollection
	{
		return DealResource::collection(
			Deal::with(['pipeline_stage.pipeline', 'contact', 'owner'])->get()
		);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreDealRequest $request
	 * @return JsonResponse
	 */
	public function store(StoreDealRequest $request): JsonResponse
	{
		$result = Deal::create($request->validated());

		return response()->json([
															'data'     => new DealResource($result),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param $contact
	 * @return AnonymousResourceCollection
	 */
	public function byContact($contact): AnonymousResourceCollection
	{
		return DealResource::collection(
			Deal::where('contact_id', $contact)
					->get()
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Deal $deal
	 * @return DealResource
	 */
	public function show(Deal $deal): DealResource
	{
		return new DealResource($deal);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateDealRequest $request
	 * @param Deal $deal
	 * @return JsonResponse
	 */
	public function update(UpdateDealRequest $request, Deal $deal): JsonResponse
	{
		$deal->update($request->validated());
		return response()->json([
															'data'     => new DealResource($deal),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Deal $deal
	 * @return Response
	 */
	public function destroy(Deal $deal)
	{
		//
	}
}
