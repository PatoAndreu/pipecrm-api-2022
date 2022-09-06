<?php

namespace App\Http\Controllers;

use App\Http\Resources\PipelineStageResource;
use App\Models\PipelineStage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PipelineStageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return AnonymousResourceCollection
	 */
  public function index(): AnonymousResourceCollection
	{
    return PipelineStageResource::collection(PipelineStage::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return void
	 */
  public function store(Request $request)
  {
    dd($request->all());
  }

  /**
   * Display the specified resource.
   *
   * @param PipelineStage $stage
   * @return PipelineStageResource
	 */
  public function show(PipelineStage $stage): PipelineStageResource
	{
    return new PipelineStageResource($stage);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param PipelineStage $pipelineStage
   * @return void
	 */
  public function update(Request $request, PipelineStage $pipelineStage)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param PipelineStage $pipelineStage
   * @return void
	 */
  public function destroy(PipelineStage $pipelineStage)
  {
    //
  }
}
