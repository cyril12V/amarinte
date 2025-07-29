<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation - Votre message a été envoyé</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #72717c 0%, #5a5a65 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 300;
        }
        .email-header .subtitle {
            margin-top: 8px;
            font-size: 14px;
            opacity: 0.9;
        }
        .email-body {
            padding: 30px 20px;
        }
        .confirmation-box {
            background-color: #f8f9fa;
            border-left: 4px solid #28a745;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
        }
        .contact-details {
            background-color: #f8f9fa;
            border-left: 4px solid #72717c;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
        }
        .info-row {
            margin-bottom: 8px;
        }
        .email-footer {
            background-color: #72717c;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }
        .signature {
            margin-top: 20px;
            font-style: italic;
            color: #6c757d;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- En-tête -->
        <div class="email-header">
            <h1>✅ Message Bien Reçu</h1>
            <div class="subtitle">AMARINTE - Stratégies de croissance internationale</div>
        </div>

        <!-- Corps de l'email -->
        <div class="email-body">
            <p>Bonjour <strong>{{ $prenom }} {{ $nom }}</strong>,</p>
            
            <div class="confirmation-box">
                <p style="margin: 0;"><strong>✓ Votre message a été envoyé avec succès !</strong></p>
                <p style="margin: 10px 0 0 0; font-size: 14px;">Nous vous répondrons dans les plus brefs délais.</p>
            </div>

            <p>Merci de nous avoir contactés. Voici un récapitulatif de votre demande :</p>

            <!-- Récapitulatif -->
            <div class="contact-details">
                <div class="info-row">
                    <strong>Nom :</strong> {{ $nom }} {{ $prenom }}
                </div>
                <div class="info-row">
                    <strong>Email :</strong> {{ $email }}
                </div>
                <div class="info-row" style="margin-top: 15px;">
                    <strong>Votre message :</strong>
                </div>
                <div style="background: white; padding: 15px; border-radius: 4px; margin-top: 8px; border: 1px solid #e9ecef;">
                    <em>{!! nl2br(e($messageContent)) !!}</em>
                </div>
            </div>

            <p>Notre équipe étudie votre demande et vous contactera prochainement pour discuter de vos besoins en stratégies de croissance internationale.</p>

            <div class="signature">
                <p>Cordialement,<br>
                <strong>L'équipe AMARINTE</strong></p>
            </div>
        </div>

        <!-- Pied de page -->
        <div class="email-footer">
            <p style="margin: 0;">
                <strong>AMARINTE</strong> - Annick SVAY-DELECROIX<br>
                28 rue de Fleury, 77300 Fontainebleau, France<br>
                📱 +33 6 12 38 53 89 | 📧 contact@elmdigitalagency.fr
            </p>
        </div>
    </div>
</body>
</html> 