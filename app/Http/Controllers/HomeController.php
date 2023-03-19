<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Mail\ContactMail;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ConfirmationMailReceived;

class HomeController extends Controller
{
    /**
     * Return Home View
     */
    public function index() {
        $portfolios = Portfolio::with('images', 'user')
                                ->get()
                                ->take(3);

        $posts = Post::with('user', 'category', 'comments', 'thumbnail')->get();

        return Inertia::render('Home', [
            'posts'      => $posts,
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Get message from client and resend automatically a success message
     */
    public function contact(ContactRequest $request)
    {
        $validated = $request->validated();

        try {
            // Send auto mail to user
            Mail::to($validated['email'])->send(new ConfirmationMailReceived(
                $validated['name'],
                $validated['email'],
                $validated['message']
            ));

            // Send mail to admin
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail(
                $validated['name'],
                $validated['email'],
                $validated['message']
            ));
        } catch(\Exception $e) {
            Log::error("Une erreur a été produite lors de l'envoi d'un mail" . $e->getMessage());
        }

        redirect()->back()->with('success', 'Votre message a bien été envoyé !');
    }
}
