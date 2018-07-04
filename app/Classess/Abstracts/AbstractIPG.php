<?php


    namespace App\Classes\Abstracts;

    use Illuminate\Http\Request;

    interface AbstractIPG {
        public function createRequest($payment,$agent);
        public function redirectToBank($token);
        public function getStatus($payment_id);
    }