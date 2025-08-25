<?php

use Kirby\Http\Remote;

return function ($page, $site, $kirby) {
    $alert   = null;
    $success = false;
    $data    = [];

    if ($kirby->request()->is('POST')) {
        // Datos del formulario
        $data = [
            'name'           => get('name'),
            'email'          => get('email'),
            'telefono'       => get('telefono'),
            'empresa'        => get('empresa'),
            'contact'        => get('contact'),
            'recaptcha_token'=> get('recaptcha_token'),
        ];

        // Reglas de validación
        $rules = [
            'name'     => ['required'],
            'email'    => ['required', 'email'],
            'telefono' => ['required'],
            'empresa'  => ['required'],
            'contact'  => ['required'],
        ];

        // Mensajes de error
        $messages = [
            'name'     => 'Por favor escribe tu nombre',
            'email'    => 'Escribe un correo válido',
            'telefono' => 'Escribe tu teléfono',
            'empresa'  => 'Escribe el nombre de tu empresa',
            'contact'  => 'Selecciona cómo deseas que te contactemos',
        ];

        // Validar datos del formulario
        if ($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;
        } else {
            // Validar reCAPTCHA v3
            $secretKey = env('RECAPTCHA_SECRET_KEY');
            $token     = $data['recaptcha_token'];

            $response = Remote::get('https://www.google.com/recaptcha/api/siteverify', [
                'data' => [
                    'secret'   => $secretKey,
                    'response' => $token
                ]
            ]);

            $result = $response->json();

            if (!$result || $result['success'] !== true || $result['score'] < 0.5) {
                $alert['recaptcha'] = 'Fallo la verificación de seguridad. Intenta nuevamente.';
            } else {
                try {
                    // Enviar correo usando Mailtrap
                    $kirby->email([
                        'template'    => 'contact',                   // Tu template de email
                        'from'        => 'no-reply@mailtrap.io',      // solo email
                        'replyTo'     => $data['email'],
                        'replyToName' => $data['name'],               // nombre del remitente
                        'to'          => 'jonatanjonas@gmail.com',    // tu correo real
                        'subject'     => 'Nuevo mensaje de contacto',
                        'data'        => $data,
                    ]);

                    $success = true;
                    $data    = []; // limpiar formulario
                } catch (Exception $e) {
                    $alert['error'] = 'No se pudo enviar el mensaje: ' . $e->getMessage();
                }
            }
        }
    }

    return [
        'alert'   => $alert,
        'success' => $success,
        'data'    => $data,
    ];
};
