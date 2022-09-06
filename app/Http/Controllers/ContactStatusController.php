<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactStatusRequest;
use App\Http\Requests\UpdateContactStatusRequest;
use App\Http\Resources\ContactStatusResource;
use App\Models\ContactStatus;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ContactStatusController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return AnonymousResourceCollection
	 */
  public function index(): AnonymousResourceCollection
	{
		$status = ContactStatus::all();
    return ContactStatusResource::collection($status);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param StoreContactStatusRequest $request
   * @return ContactStatusResource
	 */
  public function store(StoreContactStatusRequest $request): ContactStatusResource
	{
    $result = ContactStatus::create($request->validated());
		return new ContactStatusResource($result);
  }

  /**
   * Display the specified resource.
   *
   * @param ContactStatus $status
   * @return ContactStatusResource
	 */
  public function show(ContactStatus $status): ContactStatusResource
	{
    return new ContactStatusResource($status);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param UpdateContactStatusRequest $request
   * @param ContactStatus $status
   * @return ContactStatusResource
	 */
  public function update(UpdateContactStatusRequest $request, ContactStatus $status): ContactStatusResource
	{
    $status->update($request->validated());

		return new ContactStatusResource($status);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param ContactStatus $status
   * @return ContactStatusResource
	 */
  public function destroy(ContactStatus $status): ContactStatusResource
	{
    $status->delete();
		return new ContactStatusResource($status);
  }
}
