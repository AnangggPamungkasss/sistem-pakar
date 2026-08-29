@extends('dashboard.mainlayout')
@section('title', 'Diagnosa Cedera')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4 text-center w-100 diagnosa" style="max-width:600px;">
        @include('diagnosa.mulai_diagnosa')
        @include('diagnosa.penalaran')
        @include('diagnosa.forward')
        @include('diagnosa.backward')
        @include('diagnosa.hasil')
    </div>
</div>
@endsection

@section('script')
<script>
window.LaravelData = @json([
    'gejala' => $gejalaJs,
    'rules' => $rulesJs,
    'cedera' => $cederaJs
], JSON_UNESCAPED_UNICODE);
</script>

<script src="{{ asset('asset/js/diagnosa.js') }}"></script>
@endsection