<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return redirect()->route($user->role === 'admin' ? 'dashboard.admin' : 'dashboard.user');
    }

    public function admin()
    {
        return $this->showDashboard();
    }

    public function user()
    {
        return $this->showDashboard();
    }

    protected function showDashboard()
    {
        $user = auth()->user();

        $usersResponse = Http::get(url('/api/users'));
        $postsResponse = Http::get('https://jsonplaceholder.typicode.com/posts?_limit=5');

        $users = $usersResponse->successful() ? $usersResponse->json() : [];
        $posts = $postsResponse->successful() ? $postsResponse->json() : [];

        return view('dashboard', compact('user', 'users', 'posts'));
    }
}
