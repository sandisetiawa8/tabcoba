<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('rupiah_format'))
{
    function rupiah($number)
    {
        return 'Rp. '.number_format($number, 0, ',', '.');
    }
}