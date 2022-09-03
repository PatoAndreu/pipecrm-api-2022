<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePipelineRequest;
use App\Http\Requests\UpdatePipelineRequest;
use App\Models\Pipeline;

class PipelineController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Pipeline::with(['pipeline_stages.deals'])->get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePipelineRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePipelineRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pipeline  $pipeline
   * @return \Illuminate\Http\Response
   */
  public function show(Pipeline $pipeline)
  {
    // return Pipeline::with('pipeline_stages')->get();
    return $pipeline;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePipelineRequest  $request
   * @param  \App\Models\Pipeline  $pipeline
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePipelineRequest $request, Pipeline $pipeline)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pipeline  $pipeline
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pipeline $pipeline)
  {
    //
  }
}
