<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreLifeCycleStageRequest;
use App\Http\Requests\Contact\UpdateLifeCycleStageRequest;
use App\Models\LifeCycleStage;

class LifeCycleStageController extends Controller
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
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\Contact\StoreLifeCycleStageRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreLifeCycleStageRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\LifeCycleStage  $lifeCycleStage
   * @return \Illuminate\Http\Response
   */
  public function show(LifeCycleStage $lifeCycleStage)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\Contact\UpdateLifeCycleStageRequest  $request
   * @param  \App\Models\LifeCycleStage  $lifeCycleStage
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateLifeCycleStageRequest $request, LifeCycleStage $lifeCycleStage)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\LifeCycleStage  $lifeCycleStage
   * @return \Illuminate\Http\Response
   */
  public function destroy(LifeCycleStage $lifeCycleStage)
  {
    //
  }
}
