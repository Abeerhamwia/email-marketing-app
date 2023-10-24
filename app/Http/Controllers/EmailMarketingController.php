<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailMarketingMail;

class EmailMarketingController extends Controller
{
    public function index()
    {
        return view('emailmarketing.index');
    }

    public function sendEmail(Request $request)
    {
        try {
            $request->validate([
                'csv_file' => 'required|mimes:csv,txt',
                'email_content' => 'required',
                'email_subject' => 'required', 
            ]);
            
            $path = $request->file('csv_file')->getRealPath();
            $contacts = array_map('str_getcsv', file($path));
            
            $emailContent = $request->input('email_content');
            $emailSubject = $request->input('email_subject');
            
            foreach ($contacts as $contact) {
                $email = $contact[0];
                
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    
                    Mail::to($email)->send(new EmailMarketingMail($emailContent, $emailSubject));
                }
            }
            
            return redirect()->route('emailmarketing.index')->with('success', 'Emails sent successfully.');
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
