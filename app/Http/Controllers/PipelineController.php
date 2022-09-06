<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePipelineRequest;
use App\Http\Requests\UpdatePipelineRequest;
use App\Http\Resources\PipelineResource;
use App\Models\Pipeline;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PipelineController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return AnonymousResourceCollection
	 */
  public function index(): AnonymousResourceCollection
	{
    return PipelineResource::collection(Pipeline::with(['pipeline_stages.deals'])->get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  StorePipelineRequest  $request
   * @return PipelineResource
	 */
  public function store(StorePipelineRequest $request): PipelineResource
	{
		$result = Pipeline::create($request->validated());

		return new PipelineResource($result);
  }

  /**
   * Display the specified resource.
   *
   * @param Pipeline $pipeline
   * @return PipelineResource
	 */
  public function show(Pipeline $pipeline): PipelineResource
  {
    // return Pipeline::with('pipeline_stages')->get();
    return new PipelineResource($pipeline);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param UpdatePipelineRequest $request
   * @param Pipeline $pipeline
   * @return PipelineResource
	 */
  public function update(UpdatePipelineRequest $request, Pipeline $pipeline): PipelineResource
	{
		$pipeline->update($request->validated());
		return new PipelineResource($pipeline);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Pipeline $pipeline
   * @return Response
   */
  public function destroy(Pipeline $pipeline): Response
	{
		$pipeline->delete();
		return response('', 204);
  }
}
