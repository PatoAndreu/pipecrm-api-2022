<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pipeline;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\PipelineResource;
use App\Http\Requests\Pipeline\StorePipelineRequest;
use App\Http\Requests\Pipeline\UpdatePipelineRequest;
use App\Models\Deal;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

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
   * Display a listing of the resource.
   *
   * @return PipelineResource
   */
  public function byUser(Request $request): PipelineResource
  {
    return new PipelineResource(Pipeline::findOrFail($request->id)->with(['pipeline_stages.deals.owner', 'pipeline_stages.deals'  => function ($query) use ($request) {
      if ($request->userId) {
        $query->where('owner_id', $request->userId);
      }
    }])->first());
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
  public function show(Pipeline $pipeline)
  {
    return $pipeline->with(['pipeline_stages.deals'])->get();
    // return new PipelineResource($pipeline);
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
