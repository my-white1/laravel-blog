@if ($alert = session()->pull('alert'))
    <div class="alert alert-success mb-0 text-center small rounded-0 py-2">
        {{ $alert }}
    </div>
@endif
