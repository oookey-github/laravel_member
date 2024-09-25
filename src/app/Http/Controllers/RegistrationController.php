<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:registrations',
            ]);

            // 仮登録の保存
            $registration = new Registration();
            $registration->email = $request->email;
            $registration->url_token = Str::random(32);
            $registration->flag = 0;
            $registration->save();

            // メール送信処理
            Mail::to($registration->email)->send(new VerificationEmail($registration->url_token));

            return redirect()->route('register')->with('success', '仮登録が完了しました。メールを確認してください。');
        } catch (\Exception $e) {
            Log::error('Registration error', ['message' => $e->getMessage()]);
            return redirect()->route('register')->withErrors(['error' => '登録に失敗しました。']);
        }
    }
}
