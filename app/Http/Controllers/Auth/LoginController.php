<?php

namespace App\Http\Controllers\Auth¬;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
  public function __invoke(Request $request)
  {
    if (!auth()->attempt($request->only('email', 'password'))) {
      throw new AuthenticationException();
    }
  }
}
