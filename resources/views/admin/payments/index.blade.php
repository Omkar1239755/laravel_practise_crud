@extends('admin.layouts.master')

@section('content')

<div class="card shadow-sm p-4">
    <h3 class="mb-4">Stripe Payment</h3>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Private Key --}}
        <div class="mb-3">
            <label class="form-label">Private Key</label>
            <input type="text" 
                   name="private_key" 
                   class="form-control"
                   placeholder="Enter Private Key"
                   autocomplete="new-private-key"
                   required>
        </div>

        {{-- Secret Key --}}
        <div class="mb-3">
            <label class="form-label">Secret Key</label>
            <input type="text" 
                   name="secret_key" 
                   class="form-control"
                   placeholder="Enter Secret Key"
                   autocomplete="new-secret-key"
                   required>
        </div>

        <button class="btn btn-primary mt-3">
            Save Payment
        </button>

    </form>

</div>

@endsection
