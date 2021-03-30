@extends('layouts.app2')


@section('menu1')
<div id="collapseDashboard" class="collapse" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('KategoriSektor')}}">Kategori Sektor</a>
        <a class="collapse-item" href="{{route('WilayahProvinsi')}}">Wilayah Provinsi</a>
    </div>
</div>
@endsection


@section('menu2')
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('DataKomoditi')}}">Data Komoditi</a>
        <a class="collapse-item" href="{{route('DataPdb')}}">Data PDB</a>
    </div>
</div>
@endsection

@section('content')
<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
@endsection