<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Partages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="maw-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($user->profile->links as $link )
                <a href="{{ route('profile.links.template', $link->token) }}">
                    See the template
                </a><br>
            @endforeach
        </div>
    </div>
</x-app-layout>