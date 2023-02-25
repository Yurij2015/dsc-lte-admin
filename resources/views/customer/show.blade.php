@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Customer - {{ $customer->fullName }}</h1>
@stop
@php
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th style="width: 30%">Full Name</th>
                            <th style="width: 70%">{!! $customer->fullName !!}</th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{!! $customer->email !!}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{!! $customer->phone !!}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td colspan="2">{!! $customer->address !!}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td colspan="2">{!! $customer->city !!}</td>
                        </tr>
                        <tr>
                            <th>Region</th>
                            <td colspan="2">{!! $customer->region !!}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td colspan="2">{!! $customer->country !!}</td>
                        </tr>
                        <tr>
                            <th>Postal code</th>
                            <td colspan="2">{!! $customer->postal_code !!}</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('customers.index') }}">
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow"
                                            title="Back to list of customers">
                                        <i class="fa fa-lg fa-fw fa-arrow-circle-left"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <nobr>
                                    <a href="{{ route('customer.update.form', $customer->id) }}">{!! $btnEdit !!}</a>
                                    <a href="{{ route('customer.destroy', $customer->id) }}">{!! $btnDelete !!}</a>
                                </nobr>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @if(count($customer->companies))
                <h3 class="mb-1 text-dark">Companies of customer - {{ $customer->fullName }}</h3>
                <div class="card">
                    <div class="card-body">
                        @php
                            $heads = ['#', 'Name', 'Email', 'Phone', 'Address'];
                        @endphp
                        <x-adminlte-datatable id="table1"
                                              :heads="$heads"
                                              head-theme="light"
                                              theme="light"
                                              striped
                                              hoverable
                                              bordered>
                            @foreach($customer->companies as $row)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td>{!! $row->name !!}</td>
                                    <td>{!! $row->email!!}</td>
                                    <td>{!! $row->phone !!}</td>
                                    <td>{!! $row->address !!}</td>
                                </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

