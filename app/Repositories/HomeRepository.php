<?php

namespace App\Repositories;

class HomeRepository
{
    public function getIndexData()
    {
        // No DB, just return static content
        return [
            'title' => 'Welcome to My Static Page',
            'content' => 'This is a simple static index page using 4-layer architecture.'
        ];
    }
}
