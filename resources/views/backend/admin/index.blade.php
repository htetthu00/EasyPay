@extends('backend.layouts.app')

@section('title', 'Admins')

@section('page_title', 'Admins')

@section('content')
    <div class="mb-4 text-end">
        <a href="{{ route('admin-user.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Admin</a>
    </div>
    <div class="content-section">
        <div class="card">
            <div class="card-body">
                <table class="table data-table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{-- <th>Action</th> --}}
                    </thead>
                    <tbody>
                        {{-- Datetable Data --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
    
@push('script')
    <script>
        $(() => {
            $('.data-table').DataTable({
                serverSide : true,
                processing : true,
                ajax : "{{ route('admin.admin-user.data') }}",
                columns : [
                    {
                        data : 'id',
                        name : 'id'
                    },
                    {
                        data : 'name',
                        name : 'name'
                    },
                    {
                        data : 'email',
                        name : 'email'
                    },
                    {
                        data : 'phone',
                        name : 'Phone'
                    }
                ]
            })
        })
    </script>
@endpush
    