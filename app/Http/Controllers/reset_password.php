<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\otps;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Mail\OtpMail; // Import the mail class
use Illuminate\Support\Facades\Mail;
class reset_password extends Controller
{

    public function resetPassword(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
    
        // Check if the email already exists in the users table
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return response()->json(['message' => 'Email does not exist in the users table.'], 400);
        }
    
        // Generate a fun and unique OTP (Magic Spell)
        $magicSpell = Str::random(8); // Example: Abracadabra123
    
        // Store the OTP in the otps table
        Otps::updateOrCreate(
            ['email' => $request->email],
            ['otp' => Hash::make($magicSpell), 'expires_at' => now()->addMinutes(15)]
        );
    
        
        Mail::to($request->email)->send(new OtpMail($magicSpell)); 
       
    
        // Return a fun response with the Magic Spell
        return response()->json(['message' => 'A magical spell has been sent to your email address! 🪄✨ Please recite the spell to reset your password.'], 200);
    }

    public function verifyAndResetPassword(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }
    
        // Verify OTP (Magic Spell) and retrieve user
        $otp = Otps::where('email', $request->email)->first();
    
        if (!$otp || !Hash::check($request->otp, $otp->otp)) {
            return response()->json(['message' => 'Invalid or expired magic spell! Please try again.'], 400);
        }
    
        // Update user's password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Delete the used OTP (Magic Spell) from the otps table
        $otp->delete();
    
        // Return a fun success message
        return response()->json(['message' => 'Congratulations! 🎉 Your password has been successfully reset.'], 200);
    }






}
