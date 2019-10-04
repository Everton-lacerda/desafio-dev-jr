<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
class AuthController extends Controller 
{
    /**
     * @var $jwtAuth
     */
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = $this->jwtAuth->attempt($credentials)) {
            return response()->json(['error' => 'invalid credentials'], 401);
        }
        
        // $user  =$this->jwtAuth->authenticate($token); 

        return response()->json(compact('token'));
    }

    public function refresh()
    {
       $token = $this->jwtAuth->getToken();
       $token = $this->jwtAuth->refresh($token);

       return response()->json(compact('token'));

    }
    public function logout()
    {
        $token = $this->jwtAuth->getToken();
        $this->jwtAuth->invalidate($token);
        return response()->json('logout');
    }

    public function getAuthenticatedUser()
    {

        if (!$user = $this->jwtAuth->parseToken()->authenticate()) {
            return response()->json(['error' => 'user not found'], 401);
        }

        return response()->json(compact('user'));
    }
}
