<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold">Welcome, {{ $user->name }}!</h3>
                    <p class="mt-2 text-sm text-gray-600">Role: <strong class="capitalize">{{ $user->role }}</strong></p>
                    <p class="mt-4 text-sm text-gray-600">This dashboard shows your profile, data from the app API, and public API results.</p>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold">User Profile</h3>
                        <div class="mt-4 space-y-2 text-sm text-gray-600">
                            <div><strong>Name:</strong> {{ $user->name }}</div>
                            <div><strong>Email:</strong> {{ $user->email }}</div>
                            <div><strong>Role:</strong> {{ ucfirst($user->role) }}</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold">API Data from /api/users</h3>
                        @if(count($users))
                            <div class="mt-4 overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-2 text-left font-medium text-gray-700">Name</th>
                                            <th class="px-4 py-2 text-left font-medium text-gray-700">Email</th>
                                            <th class="px-4 py-2 text-left font-medium text-gray-700">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($users as $apiUser)
                                            <tr>
                                                <td class="px-4 py-2">{{ $apiUser['name'] }}</td>
                                                <td class="px-4 py-2">{{ $apiUser['email'] }}</td>
                                                <td class="px-4 py-2 capitalize">{{ $apiUser['role'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="mt-4 text-gray-500">No user data available from the API.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold">Public API Data</h3>
                    @if(count($posts))
                        <div class="mt-4 space-y-4">
                            @foreach(array_slice($posts, 0, 5) as $post)
                                <div class="rounded-lg border border-gray-200 p-4">
                                    <h4 class="font-semibold text-gray-800">{{ $post['title'] }}</h4>
                                    <p class="mt-2 text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($post['body'], 120) }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="mt-4 text-gray-500">Unable to load public API data right now.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
