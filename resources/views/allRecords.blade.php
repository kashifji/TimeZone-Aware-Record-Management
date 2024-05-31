@extends('layouts.app')

@section('styles')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="container">
    <table id="recordsTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
let token = '{{ csrf_token() }}';
</script>
<script src="{{ asset('js/allRecords.js') }}"></script>
@endsection
