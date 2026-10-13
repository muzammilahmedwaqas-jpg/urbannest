@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-success small py-2 mb-3']) }} role="alert">
        {{ $status }}
    </div>
@endif
