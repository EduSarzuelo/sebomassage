<?php

require 'vendor/autoload.php';

define('SITE_URL','http://localhost:8080/FinalSebo');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AV_hspDiZav5KCmi1YfLqriXKWQP6SriLAoQD1Nmyt-GSANH7MHkRsXytVv2v0o6RFb2z4A-J9wCYuec',
        'ENwirD-FcMf3QhWgtWVoAkjL0UD6XT-Q8eCeewtwbimPPuYDn5cGqlFSpE9DridJMr6f9u2Uv5A0UlC_'
        )
);