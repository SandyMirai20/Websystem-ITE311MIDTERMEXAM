<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if user is logged in
        if (!$session->get('user_id')) {
            return redirect()->to('/login')->with('error', 'Please login to continue.');
        }

        $userRole = $session->get('user_role') ?? 'student';
        $currentPath = $request->getPath();

        // Define role-based access rules
        $accessRules = [
            'admin' => [
                'admin' => true,       // admins can access /admin/*
                'teacher' => true,     // admins can also access /teacher/*
                'student' => true,     // admins can also access /student/*
                'announcements' => true, // admins can access /announcements
            ],
            'teacher' => [
                'teacher' => true,     // teachers can access /teacher/*
                'announcements' => true, // teachers can access /announcements
            ],
            'student' => [
                'student' => true,     // students can access /student/*
                'announcements' => true, // students can access /announcements
            ],
        ];

        // Check if the current path matches any allowed pattern for the user's role
        $hasAccess = false;

        if (isset($accessRules[$userRole])) {
            foreach ($accessRules[$userRole] as $allowedPath => $allowed) {
                if ($allowed && str_starts_with($currentPath, $allowedPath)) {
                    $hasAccess = true;
                    break;
                }
            }
        }

        // If user doesn't have access, redirect to announcements with error message
        if (!$hasAccess) {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing needed
    }
}
