<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return AnonymousResourceCollection
	 */
  public function index(): AnonymousResourceCollection
	{
    return UserResource::collection(User::orderBy('first_name')->get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param StoreUserRequest $request
   * @return UserResource
	 */
  public function store(StoreUserRequest $request): UserResource
	{
		dd($request->all());
    $user = User::create($request->validated());
		return new UserResource($user);
  }

  /**
   * Display the specified resource.
   *
   * @param User $user
   * @return UserResource
	 */
  public function show(User $user): UserResource
	{
    return new UserResource($user);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param UpdateUserRequest $request
   * @param User $user
   * @return UserResource
   */
  public function update(UpdateUserRequest $request, User $user): UserResource
	{
    $user->update($request->validated());

		return new UserResource($user);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param User $user
   * @return UserResource
	 */
  public function destroy(User $user): UserResource
	{
     $user->delete();
		 return new UserResource($user);
  }
}
