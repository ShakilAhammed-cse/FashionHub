<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Email details
        $to = 'shakilmsapro@gmail.com';
        $subject = 'New Contact Form: ' . $validated['subject'];
        $emailBody = "Name: " . $validated['name'] . "\n";
        $emailBody .= "Email: " . $validated['email'] . "\n";
        $emailBody .= "Subject: " . $validated['subject'] . "\n\n";
        $emailBody .= "Message:\n" . $validated['message'];

        // Send email headers
        $headers = "From: " . $validated['email'] . "\r\n";
        $headers .= "Reply-To: " . $validated['email'] . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        try {
            // Try to send email
            mail($to, $subject, $emailBody, $headers);
        } catch (\Exception $e) {
            // If mail fails, log it
            \Log::warning('Contact form email failed to send', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'error' => $e->getMessage()
            ]);
        }

        // Always show success message to user
        return redirect()->route('contact')->with('success', 'Message sent successfully! We will get back to you soon.');
    }
}
