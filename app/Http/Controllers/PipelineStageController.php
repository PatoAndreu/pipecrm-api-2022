<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pipeline\StorePipelineStageRequest;
use App\Http\Requests\Pipeline\UpdatePipelineStageRequest;
use App\Http\Resources\PipelineStageResource;
use App\Models\PipelineStage;
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
    return PipelineStageResource::collection(PipelineStage::orderBy('order')->get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param StorePipelineStageRequest $request
   * @return PipelineStageResource
	 */
  public function store(StorePipelineStageRequest $request): PipelineStageResource
  {
//		dd($request->all());
		$result = PipelineStage::create($request->validated());

		return new PipelineStageResource($result);
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
   * @param UpdatePipelineStageRequest $request
   * @param PipelineStage $stage
   * @return PipelineStageResource
	 */
  public function update(UpdatePipelineStageRequest $request, PipelineStage $stage): PipelineStageResource
  {
		$stage->update($request->validated());
		return new PipelineStageResource($stage);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param PipelineStage $stage
   * @return Response
	 */
  public function destroy(PipelineStage $stage): Response
	{
    $stage->delete();
		return response('', 204);
  }
}
