<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\StoreDealRequest;
use App\Http\Requests\Deal\UpdateDealRequest;
use App\Http\Resources\DealResource;
use App\Models\Deal;
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
	 * @return Response
	 */
	public function store(StoreDealRequest $request)
	{
		//
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
	 * @return Response
	 */
	public function show(Deal $deal)
	{
		return new DealResource($deal);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateDealRequest $request
	 * @param Deal $deal
	 * @return Response
	 */
	public function update(UpdateDealRequest $request, Deal $deal)
	{
		//
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
