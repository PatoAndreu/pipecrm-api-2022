<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pipeline\StorePipelineStageRequest;
use App\Http\Requests\UpdateDealStageRequest;
use App\Models\PipelineStage;

class DealStageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
   * @param  \App\Http\Requests\Pipeline\StorePipelineStageRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePipelineStageRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\PipelineStage  $dealStage
   * @return \Illuminate\Http\Response
   */
  public function show(PipelineStage $dealStage)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\PipelineStage  $dealStage
   * @return \Illuminate\Http\Response
   */
  public function edit(PipelineStage $dealStage)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateDealStageRequest  $request
   * @param  \App\Models\PipelineStage  $dealStage
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateDealStageRequest $request, PipelineStage $dealStage)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\PipelineStage  $dealStage
   * @return \Illuminate\Http\Response
   */
  public function destroy(PipelineStage $dealStage)
  {
    //
  }
}
