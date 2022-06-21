<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:profile.experience-form
            :profile="$user->profile"
        />
    </div>
</x-app-layout>