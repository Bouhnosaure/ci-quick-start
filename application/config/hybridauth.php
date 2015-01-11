<?php

$config = array(
    "providers" => array(
        "google" => array(
            "enabled" => true,
            "callback" => "http://localhost/ci-quick-start/login/social/google",
            "keys" => array(
                "id" => "800025791272-jrhhh9ks60q2ulcv1n6ri8h3vfb1glk8.apps.googleusercontent.com",
                "secret" => "gBfBfRlSwD1BSg4Ebm1-gRzo"
            ),
        ),
        "facebook" => array(
            "enabled" => true,
            "callback" => "http://localhost/ci-quick-start/login/social/facebook",
            "keys" => array(
                "id" => "995404767141220",
                "secret" => "b0cf894bc5209c443732c9ddfc750193"
            ),
        ),
        "twitter" => array(
            "enabled" => true,
            "callback" => "http://localhost/ci-quick-start/login/social/twitter",
            "keys" => array(
                "key" => "15QjtEHIuS2iPpmFp3eSPqXYU",
                "secret" => "xpsDra3SBRUBmI83jpLnFnAyEPDoR9ZtALzXpybBJXtt154lyL"
            )
        )
    )
);
