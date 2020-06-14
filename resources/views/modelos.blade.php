@extends('layouts.main')

@section('style')

@endsection

@section('content')
        <div class="flex justify-center mx-auto p-4 max-w-4xl rounded shadow mb-4">
            <livewire:modelos>
        </div>
@endsection

@section('script')
 <script>
     window.livewire.on('alert', param => {
         toastr[param['type']](param['message'], param['type']);
     })
 </script>
@endsection