@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Companies</h1>
@stop
@php
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('company.create.form') }}" class="btn btn-primary float-right mb-3">Add company</a>
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
                        @foreach($companies->items() as $row)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $row->name !!}</td>
                                <td>{!! $row->email!!}</td>
                                <td>{!! $row->phone !!}</td>
                                <td>{!! $row->country !!}</td>
                                <td>{!! count($row->customers) ?: '-' !!}</td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('company.show', $row->id) }}">{!! $btnDetails !!}</a>
                                        <a href="{{ route('company.update.form', $row->id) }}">{!! $btnEdit !!}</a>
                                        <a href="{{ route('company.destroy', $row->id) }}">{!! $btnDelete !!}</a>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $companies->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
@stop
