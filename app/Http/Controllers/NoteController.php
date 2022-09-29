<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NoteController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return AnonymousResourceCollection
	 */
	public function index(): AnonymousResourceCollection
	{
		return NoteResource::collection(
			Note::orderBy('created_at', 'desc')->get()
		);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param $contact
	 * @return AnonymousResourceCollection
	 */
	public function byContact($contact): AnonymousResourceCollection
	{
		return NoteResource::collection(
			Note::where('contact_id', $contact)
					->orderBy('created_at', 'asc')
					->get()
		);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreNoteRequest $request
	 * @return JsonResponse
	 */
	public function store(StoreNoteRequest $request): JsonResponse
	{
		$result = Note::create($request->validated());

		return response()->json([
															'data'     => new NoteResource($result),
															'response' => ['status' => 200, 'errors' => NULL]
														]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Note $note
	 * @return NoteResource
	 */
	public function show(Note $note): NoteResource
	{
		return new NoteResource($note);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateNoteRequest $request
	 * @param Note $note
	 * @return JsonResponse
	 */
	public function update(UpdateNoteRequest $request, Note $note): JsonResponse
	{
		$note->update($request->validated());
		return response()->json([
															'data'     => new NoteResource($note),
															'response' => ['status' => 200, 'errors' => NULL]
														]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Note $note
	 * @return JsonResponse
	 */
	public function destroy(Note $note): JsonResponse
	{
		$note->delete();
		return response()->json([
															'data'     => NULL,
															'response' => ['status' => 200, 'errors' => NULL]
														]);
	}
}
