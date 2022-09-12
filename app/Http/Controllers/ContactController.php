<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

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
															'data'   => new ContactResource($result),
															'status' => 200
														]);
//		return new ContactResource($result);
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
	 * @param UpdateContactRequest $request
	 * @param Contact $contact
	 * @return JsonResponse
	 */
	public function update(UpdateContactRequest $request, Contact $contact): JsonResponse
	{
		$contact->update($request->validated());
		return response()->json([
															'data'   => new ContactResource($contact),
															'status' => 200
														]);
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
		return response('', 204);
	}
}
