<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-bold mb-0 text-dark">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                        <i class="bi bi-person-check fs-3"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Welcome back, {{ Auth::user()->name }}!</h5>
                        <p class="text-muted mb-0">{{ __("You're logged in!") }}</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6 col-lg-4">
                        <div class="card border bg-light h-100">
                            <div class="card-body">
                                <h6 class="fw-bold mb-2">Explore Events</h6>
                                <p class="text-muted small mb-3">Browse upcoming conferences, workshops, and reserve your tickets.</p>
                                <a href="{{ route('events.index') }}" class="btn btn-sm btn-outline-primary">
                                    View Events &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->is_admin)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border bg-light h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-2">Admin Panel</h6>
                                    <p class="text-muted small mb-3">Create and manage events, tiered ticket categories, and attendees.</p>
                                    <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-dark">
                                        Manage Events &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6 col-lg-4">
                        <div class="card border bg-light h-100">
                            <div class="card-body">
                                <h6 class="fw-bold mb-2">Profile Settings</h6>
                                <p class="text-muted small mb-3">Update your personal account information and manage your password.</p>
                                <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-secondary">
                                    Edit Profile &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
