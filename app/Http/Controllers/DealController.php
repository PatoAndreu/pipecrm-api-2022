<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deal\StoreDealRequest;
use App\Http\Requests\Deal\UpdateDealRequest;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DealController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return AnonymousResourceCollection
	 */
  public function index(): AnonymousResourceCollection
	{
    return DealResource::collection(Deal::with(['pipeline_stage.pipeline', 'contact', 'owner'])->get());
    // return Deal::with(['pipeline_stage.pipeline', 'pipeline.pipelinestages'])->first();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\Deal\StoreDealRequest  $request
   * @return \Illuminate\Http\Response
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
   * @param  \App\Models\Deal  $deal
   * @return \Illuminate\Http\Response
   */
  public function show(Deal $deal)
  {
    return $deal;
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\Deal\UpdateDealRequest  $request
   * @param  \App\Models\Deal  $deal
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateDealRequest $request, Deal $deal)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Deal  $deal
   * @return \Illuminate\Http\Response
   */
  public function destroy(Deal $deal)
  {
    //
  }
}
