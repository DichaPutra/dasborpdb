@extends('layouts.app2')


@section('menu')
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDashboard"
       aria-expanded="true" aria-controls="collapseDashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
    <div id="collapseDashboard" class="collapse" aria-labelledby="headingDashboard" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('KategoriSektor')}}">Kategori Sektor</a>
            <a class="collapse-item" href="{{route('WilayahProvinsi')}}">Wilayah Provinsi</a>
        </div>
    </div>
</li>

<!-- Nav Item - Master Data -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
       aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-database"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('DataPdb')}}">Data PDRB</a>
        </div>
    </div>
</li>

<!-- Nav Item - Panduan -->
<li class="nav-item">
    <a class="nav-link" href="{{route('panduan')}}">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Panduan</span></a>
</li>

<!-- Nav Item - Tentang -->
<li class="nav-item">
    <a class="nav-link" href="{{route('tentang')}}">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Tentang</span></a>
</li>
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