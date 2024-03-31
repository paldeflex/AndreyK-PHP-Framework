<?php

namespace App\Controllers;
use Exception;
use Framework\Controller;

class ContactController
{

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $title = 'Страница контактов';
        $name = 'John Doe';
        view('contact', compact('title', 'name'));
    }

    public function send(): string
    {
        return 'Contact form POST page';
    }
}