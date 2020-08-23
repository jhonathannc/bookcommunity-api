<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email:rfc,dns|unique:users',
                'name' => 'required|max:40',
                'password' => 'required|min:4|max:20'
            ]);

            $email = $request->email;
            $name = $request->name;

            $user = User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password)
            ]);

            $token = Str::random(50);

            EmailVerification::updateOrCreate(
                [   'user_id' => $user->id,'type' => 1],
                [   'token' => $token,
                    'expires_at' => now()->addHour() ]);

            $subject = env('APP_NAME').' - Verify your email address';

            Mail::send('email.verify', ['name' => $name, 'verification_code' => $token],
                function($mail) use ($email, $name, $subject){
                    $mail->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                    $mail->to($email, $name);
                    $mail->subject($subject);
                });

            return response()->json([
                'success'=> true,
                'message'=> 'Thanks for signing up! Please check your email to complete your registration.'
            ], 201);

        } catch (\ErrorException $err){
            return response()->json($err);
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);

        if(!$token = auth('api')->attempt($credentials))
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);

        return $this->respondWithToken($token);
    }

    public function me()
    {
        try {
            $me = auth()->userOrFail();
            return response()->json($me);
        } catch (UserNotDefinedException $err) {
            return response()->json(['message' => 'Unauthenticated user.'], 401);
        }
    }

    public function logout()
    {
        try {
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (JWTException $err){
            return response()->json(['message' => 'Error when logout, maybe your token is missing or its expired'], 511);
        }

    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function verify($token)
    {
        try {
            $verification = EmailVerification::where([
                ['token', $token],
                ['expires_at', '>', now()]])->firstOrFail();

            $user = $verification->user;

            if(!isset($user->email_verified_at)){
                $user->update(['email_verified_at' => now()]);
                $verification->delete();

                return response()->json(
                    ['message' => 'Your email has been successfully verified.'],
                    200);
            } else
                return response()->json(
                    ['message' => 'Your email has already been verified.'],
                    404);

        } catch (ModelNotFoundException $err){
            return response()->json(['message' => 'Token not found or expired.'], 401);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
