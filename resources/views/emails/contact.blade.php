<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact - AMARINTE</title>
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
        .contact-info {
            background-color: #f8f9fa;
            border-left: 4px solid #72717c;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
        }
        .info-row {
            display: flex;
            margin-bottom: 12px;
            align-items: center;
        }
        .info-label {
            font-weight: 600;
            color: #72717c;
            min-width: 80px;
            margin-right: 15px;
        }
        .info-value {
            color: #333;
            flex: 1;
        }
        .message-section {
            margin-top: 25px;
        }
        .message-label {
            font-weight: 600;
            color: #72717c;
            margin-bottom: 10px;
            border-bottom: 2px solid #72717c;
            padding-bottom: 5px;
        }
        .message-content {
            background-color: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 20px;
            margin-top: 10px;
            font-style: italic;
            line-height: 1.7;
        }
        .email-footer {
            background-color: #72717c;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }
        .timestamp {
            color: #6c757d;
            font-size: 12px;
            text-align: right;
            margin-top: 20px;
            border-top: 1px solid #e9ecef;
            padding-top: 15px;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 0;
            }
            .info-row {
                flex-direction: column;
                align-items: flex-start;
            }
            .info-label {
                min-width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- En-tête -->
        <div class="email-header">
            <h1>📧 Nouveau Message de Contact</h1>
            <div class="subtitle">AMARINTE - Stratégies de croissance internationale</div>
        </div>

        <!-- Corps de l'email -->
        <div class="email-body">
            <p>Bonjour,</p>
            <p>Vous avez reçu un nouveau message via le formulaire de contact de votre site web AMARINTE.</p>

            <!-- Informations du contact -->
            <div class="contact-info">
                <div class="info-row">
                    <span class="info-label">👤 Nom :</span>
                    <span class="info-value"><strong>{{ $nom }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">🙋 Prénom :</span>
                    <span class="info-value"><strong>{{ $prenom }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">📧 Email :</span>
                    <span class="info-value"><a href="mailto:{{ $email }}" style="color: #72717c; text-decoration: none;">{{ $email }}</a></span>
                </div>
            </div>

            <!-- Message -->
            <div class="message-section">
                <div class="message-label">💬 Message :</div>
                <div class="message-content">
                    {!! nl2br(e($messageContent)) !!}
                </div>
            </div>

            <!-- Timestamp -->
            <div class="timestamp">
                📅 Reçu le {{ date('d/m/Y à H:i:s') }}
            </div>
        </div>

        <!-- Pied de page -->
        <div class="email-footer">
            <p style="margin: 0;">
                <strong>AMARINTE</strong> - Annick SVAY-DELECROIX<br>
                28 rue de Fleury, 77300 Fontainebleau, France<br>
                📱 +33 6 12 38 53 89
            </p>
        </div>
    </div>
</body>
</html> 