<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        Log::info('Début du traitement du formulaire de contact', ['data' => $request->all()]);
        
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|email',
                'message' => 'required|string',
                'not_robot' => 'accepted',
            ]);
            Log::info('Validation réussie', ['validated' => $validated]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreurs de validation',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }

        // Préparer les données
        $toEmail = env('TO_EMAIL');
        $toName = env('TO_NAME', '');
        $fromEmail = env('FROM_EMAIL');
        $fromName = env('FROM_NAME', '');

        try {
            // 1. Envoi de l'email avec template stylisé
            Mail::send('emails.contact', [
                'nom' => $validated['nom'],
                'prenom' => $validated['prenom'],
                'email' => $validated['email'],
                'messageContent' => $validated['message']
            ], function ($message) use ($validated, $toEmail, $toName, $fromEmail, $fromName) {
                $message->to($toEmail, $toName)
                    ->from($fromEmail, $fromName)
                    ->subject('✉️ Nouveau message de contact - AMARINTE')
                    ->replyTo($validated['email'], $validated['nom'] . ' ' . $validated['prenom']);
            });
            
            // 2. Envoi de l'email de confirmation à l'utilisateur
            Mail::send('emails.contact-confirmation', [
                'nom' => $validated['nom'],
                'prenom' => $validated['prenom'],
                'email' => $validated['email'],
                'messageContent' => $validated['message']
            ], function ($message) use ($validated, $fromEmail, $fromName) {
                $message->to($validated['email'], $validated['nom'] . ' ' . $validated['prenom'])
                    ->from($fromEmail, $fromName)
                    ->subject('✅ Confirmation - Votre message a été reçu - AMARINTE');
            });
            
            Log::info('Emails envoyés avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi de l\'email de contact', ['exception' => $e->getMessage()]);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => "Erreur lors de l'envoi de l'email : " . $e->getMessage(),
                    'errors' => ['email' => "Erreur lors de l'envoi de l'email : " . $e->getMessage()]
                ], 500);
            }
            
            return back()->withErrors(['email' => "Erreur lors de l'envoi de l'email : " . $e->getMessage()]);
        }

        // Retourne une réponse JSON pour AJAX ou redirection classique
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre message a bien été envoyé ! Nous vous répondrons dans les plus brefs délais.'
            ]);
        }
        
        return back()->with('success', 'Votre message a bien été envoyé !');
    }
} 