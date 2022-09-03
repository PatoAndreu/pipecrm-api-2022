<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactStatusRequest;
use App\Http\Requests\UpdateContactStatusRequest;
use App\Models\ContactStatus;

class ContactStatusController extends Controller
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
   * @param  \App\Http\Requests\StoreContactStatusRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreContactStatusRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ContactStatus  $contactStatus
   * @return \Illuminate\Http\Response
   */
  public function show(ContactStatus $contactStatus)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateContactStatusRequest  $request
   * @param  \App\Models\ContactStatus  $contactStatus
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateContactStatusRequest $request, ContactStatus $contactStatus)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ContactStatus  $contactStatus
   * @return \Illuminate\Http\Response
   */
  public function destroy(ContactStatus $contactStatus)
  {
    //
  }
}
