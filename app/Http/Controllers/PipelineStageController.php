<?php

namespace App\Http\Controllers;

use App\Models\PipelineStage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PipelineStageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Collection|PipelineStage[]
   */
  public function index()
  {
    return PipelineStage::all();
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
   * @param PipelineStage $pipelineStage
   * @return PipelineStage
	 */
  public function show(PipelineStage $pipelineStage): PipelineStage
	{
    return $pipelineStage;
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
