<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('id')) {
            // then send him to the login page
            return redirect()->to('/login');
        }
        // If user is already logged in and has a role Admin
        if (session()->get('id') && session()->get('role') == 'Admin') {
            // then continue to the next request
            return;
        }

        // If user is already logged in but has no role Admin
        if (session()->get('id') && session()->get('role') != 'Admin') {
            // then redirect him to the dashboard page
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
