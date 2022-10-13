<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\NoteResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\ContactResource;
use App\Http\Controllers\TaskController;
use Spatie\Activitylog\Facades\CauserResolver;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return AnonymousResourceCollection
   */
  public function index(): AnonymousResourceCollection
  {
    return ContactResource::collection(
      Contact::with(['contact_life_cycle_stage', 'contact_status', 'owner', 'company', 'deals'])
        ->orderBy('created_at', 'desc')
        ->get()
    );
  }

  public function activity($id)
  {

    TaskController::markDelayed();

    $tasks = TaskResource::collection(
      Task::with(['owner', 'contact', 'company', 'deal'])->where('contact_id', $id)
        ->orderBy('date', 'asc')
        ->orderBy('time', 'asc')
        ->get()
    );

    $notes =
      NoteResource::collection(
        Note::with(['owner', 'contact', 'company', 'deal'])->where('contact_id', $id)
          ->orderBy('created_at', 'asc')
          ->get()
      );

    // $logs = ActivityResource::collection(Activity::with(['causer', 'subject'])->where('subject_id', $id)->get());

    return response()->json([
      'data'     => $tasks->merge($notes),
      'response' => ['status' => 200, 'errors' => null]
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param StoreContactRequest $request
   * @return JsonResponse
   */
  public function store(StoreContactRequest $request): JsonResponse
  {
    $result = Contact::create($request->validated());

    return response()->json([
      'data'     => new ContactResource($result),
      'response' => ['status' => 200, 'errors' => null]
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param Contact $contact
   * @return ContactResource
   */
  public function show(Contact $contact): ContactResource
  {
    $contactResponse = $contact->loadMissing(['contact_life_cycle_stage', 'contact_status', 'owner', 'company', 'deals.pipeline.pipeline_stage',]);
    return new ContactResource($contactResponse);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param UpdateContactRequest $request
   * @param Contact $contact
   * @return JsonResponse
   */
  public function update(UpdateContactRequest $request, Contact $contact): JsonResponse
  {
    CauserResolver::setCauser(User::find(1));
    $contact->update($request->validated());
    $contactResponse = $contact->loadMissing(['deals', 'contact_life_cycle_stage', 'contact_status']);
    // activity('Contacto actualizado 2')
    //   ->performedOn($contact)
    //   ->causedBy($user)
    //   ->event('Contacto actualizado')
    //   ->tap(function (Activity $activity) {
    //     // $activity->log_name = 'Contacto actualizado';
    //   })
    //   ->log('El contacto :subject.first_name :subject.last_name, fue actualizado por :causer.first_name :causer.last_name');


    return response()->json([
      'data'     => new ContactResource($contactResponse),
      'response' => ['status' => 200, 'errors' => null]
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Contact $contact
   * @return JsonResponse
   */
  public function destroy(Contact $contact): JsonResponse
  {
    $contact->delete();
    return response()->json([
      'data'     => null,
      'response' => ['status' => 200, 'errors' => null]
    ]);
  }
}
