@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Customers</h1>
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
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered>
                        @foreach($customers->items() as $row)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $row->fullName !!}</td>
                                <td>{!! $row['email'] !!}</td>
                                <td>{!! $row['phone'] !!}</td>
                                <td>{!! $row['city'] !!}</td>
                                <td>{!! $row['country'] !!}</td>
                                <td>{!! count($row->companies) ?: '-' !!}</td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('customer.show', $row->id) }}">{!! $btnDetails !!}</a>
                                        <a href="{{ route('customer.update.form', $row->id) }}">{!! $btnEdit !!}</a>
                                        <a href="{{ route('customer.destroy', $row->id) }}">{!! $btnDelete !!}</a>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    {{ $customers->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@stop

