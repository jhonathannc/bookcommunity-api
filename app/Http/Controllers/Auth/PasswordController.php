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

class PasswordController extends Controller
{
    public function recover(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email:rfc,dns'
            ]);

            $user = User::where([
                ['email', $request->email]])->firstOrFail();

            $token = Str::random(50);
            $email = $user->email;
            $name = $user->name;

            EmailVerification::updateOrCreate(
                [   'user_id' => $user->id, 'type' => 2 ],
                [   'token' => $token,
                    'expires_at' => now()->addHour()]);

            $subject = env('APP_NAME').' - Recover Password';
            Mail::send('email.recoverpasswd', ['name' => $name, 'token' => $token],
                function($mail) use ($email, $name, $subject){
                    $mail->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                    $mail->to($email, $name);
                    $mail->subject($subject);
                });

            return response()->json(['message' => 'Password reset link has been sent to your email.'], 202);

        } catch (ModelNotFoundException $err){
            $error_message = "Your email address was not found.";
            return response()->json(['error' => $error_message], 404);
        } catch (\ErrorException $err){
            return response()->json(['message' => 'Sorry, error when process your request.'], 500);
        }
    }

    public function resetForm($token)
    {
        try {
            EmailVerification::where([
                ['token', $token],
                ['expires_at', '>', now()]])->firstOrFail();

            return view('password.reset', ['token' => $token]);

        } catch (ModelNotFoundException $err){
            return response()->json(['message' => 'Token not found or expired. Please request a new one.'], 404);
        }
    }

    public function reset(Request $request)
    {
        try {
            $token = $request->token;
            $verification = EmailVerification::where([
                ['token', $token],
                ['expires_at', '>', now()]])->firstOrFail();

            $request->validate([
                'password' => 'required|min:4|max:20',
                'repassword' => 'required|min:4|max:20|same:password'
            ]);

            $verification->user->update(['password' => Hash::make($request->password)]);
            $verification->delete();

            return response()->json(['message' => 'Password has been updated.'], 202);
        } catch (ModelNotFoundException $err){
            return response()->json(['message' => 'Token not found or expired.'], 404);
        }
    }
}
