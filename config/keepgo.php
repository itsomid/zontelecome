<?php

$sharedKey = '13ad4846f0a540beb0ac31f61625c73f';
$uuid = '9179e3d4c94a51f780f4b4ef91eba8b2';
$timestamp = time();
$hash = base64_encode(hash_hmac("sha1", $timestamp.$uuid, $sharedKey, TRUE));
$data = array(
    "hash" => $hash,
    "timestamp" => $timestamp,
    "content-type" => "application/hal+json"
);
return[
    'data' => $data
];