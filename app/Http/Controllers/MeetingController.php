<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meeting\StoreMeetingRequest;
use App\Http\Requests\Meeting\UpdateMeetingRequest;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MeetingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return MeetingResource::collection(Meeting::with(['contact', 'owner', 'company', 'deal.pipeline.pipeline_stage',])->get());
  }


  /**
   * Display a listing of the resource.
   *
   * @param $contact
   * @return AnonymousResourceCollection
   */
  public function byContact($contact): AnonymousResourceCollection
  {
    return MeetingResource::collection(
      Meeting::with(['contact', 'owner', 'company', 'deal.pipeline.pipeline_stage'])->where('contact_id', $contact)
        ->orderBy('date', 'asc')
        ->orderBy('time', 'asc')
        ->get()
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  StoreMeetingRequest  $request
   *  @return JsonResponse
   */
  public function store(StoreMeetingRequest $request): JsonResponse
  {
    $meeting = Meeting::create($request->validated());
    $mettingResponse = Meeting::with(['contact', 'owner', 'company', 'deal.pipeline.pipeline_stage',])->find($meeting->id);

    return response()->json([
      'data'     => new MeetingResource($mettingResponse),
      'response' => ['status' => 200, 'errors' => null]
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  Meeting  $meeting
   * @return MeetingResource
   */
  public function show(Meeting $meeting): MeetingResource
  {

    $mettingResponse = Meeting::with(['contact', 'owner', 'company', 'deal.pipeline.pipeline_stage',])->find($meeting->id);

    return new MeetingResource($mettingResponse);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  UpdateMeetingRequest  $request
   * @param  Meeting  $meeting
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateMeetingRequest $request, Meeting $meeting): JsonResponse
  {
    $meeting->update($request->validated());

    return response()->json([
      'data'     => new MeetingResource($meeting),
      'response' => ['status' => 200, 'errors' => null]
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Meeting  $meeting
   * @return \Illuminate\Http\Response
   */
  public function destroy(Meeting $meeting)
  {
    $meeting->delete();
    return response()->json([
      'data'     => null,
      'response' => ['status' => 200, 'errors' => null]
    ]);
  }
}
