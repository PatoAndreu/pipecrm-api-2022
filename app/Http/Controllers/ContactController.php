<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Response;

class ContactController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
  public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	{
    return ContactResource::collection(
			     Contact::with(['life_cycle_stage', 'contact_status', 'owner', 'company', 'deals'])
												->orderBy('id', 'desc')
												->get()
				   );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param StoreContactRequest $request
   * @return ContactResource
	 */
  public function store(StoreContactRequest $request): ContactResource
	{
		$result = Contact::create($request->validated());

		return new ContactResource($result);
  }

  /**
   * Display the specified resource.
   *
   * @param Contact $contact
   * @return ContactResource
	 */
  public function show(Contact $contact): ContactResource
	{
    return new ContactResource($contact);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateContactRequest  $request
   * @param Contact $contact
   * @return ContactResource
	 */
  public function update(UpdateContactRequest $request, Contact $contact): ContactResource
	{
    $contact->update($request->validated());
		return new ContactResource($contact);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Contact $contact
   * @return Response
   */
  public function destroy(Contact $contact): Response
	{
		$contact->delete();
		return response('',204);
  }
}
