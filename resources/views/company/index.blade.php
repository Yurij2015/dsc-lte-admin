@extends('adminlte::page')
@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Companies</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered>
                        @foreach($companies->items() as $row)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $row['name'] !!}</td>
                                <td>{!! $row['email'] !!}</td>
                                <td>{!! $row['phone'] !!}</td>
                                <td>{!! $row['address'] !!}</td>
                                <td>{!! $row['city'] !!}</td>
                                <td>{!! $row['region'] !!}</td>
                                <td>{!! $row['country'] !!}</td>
                                <td>{!! $row['postal_code'] !!}</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $companies->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@stop

