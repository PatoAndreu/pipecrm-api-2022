<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return AnonymousResourceCollection
	 */
	public function index(): AnonymousResourceCollection
	{
		return CompanyResource::collection(
			Company::get()
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreCompanyRequest $request
	 * @return JsonResponse
	 */
	public function store(StoreCompanyRequest $request): JsonResponse
	{
		$result = Company::create($request->validated());

		return response()->json([
															'data'     => new CompanyResource($result),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Company $company
	 * @return CompanyResource
	 */
	public function show(Company $company): CompanyResource
	{
		return new CompanyResource($company);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateCompanyRequest $request
	 * @param Company $company
	 * @return JsonResponse
	 */
	public function update(UpdateCompanyRequest $request, Company $company): JsonResponse
	{
		$company->update($request->validated());
		return response()->json([
															'data'     => new CompanyResource($company),
															'response' => ['status' => 200, 'errors' => null]
														]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Company $company
	 * @return JsonResponse
	 */
	public function destroy(Company $company): JsonResponse
	{
		$company->delete();
		return response()->json([
															'data'     => null,
															'response' => ['status' => 200, 'errors' => null]
														]);
	}
}
