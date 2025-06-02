<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Redirect implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Tidak digunakan, filter ini untuk AFTER login
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Cek apakah user baru saja login dan session login aktif
        if (uri_string() == 'login' && session()->get('isLoggedIn')) {
            return redirect()->to('/#');
        }
    }
}