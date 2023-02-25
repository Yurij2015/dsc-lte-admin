@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Company - {{ $company->name }}</h1>
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
                            <th style="width: 30%">Company name</th>
                            <th style="width: 70%">{!! $company->name !!}</th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{!! $company->email !!}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{!! $company->phone !!}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td colspan="2">{!! $company->address !!}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td colspan="2">{!! $company->city !!}</td>
                        </tr>
                        <tr>
                            <th>Region</th>
                            <td colspan="2">{!! $company->region !!}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td colspan="2">{!! $company->country !!}</td>
                        </tr>
                        <tr>
                            <th>Postal code</th>
                            <td colspan="2">{!! $company->postal_code !!}</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('companies.index') }}">
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow"
                                            title="Back to list of companies">
                                        <i class="fa fa-lg fa-fw fa-arrow-circle-left"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <nobr>
                                    <a href="{{ route('company.update.form', $company->id) }}">{!! $btnEdit !!}</a>
                                    <a href="{{ route('company.destroy', $company->id) }}">{!! $btnDelete !!}</a>
                                </nobr>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @if(count($company->customers))
                <h3 class="mb-1 text-dark">Customers of company - {{ $company->name }}</h3>
                <div class="card">
                    <div class="card-body">
                        @php
                            $heads = ['#', 'Full Name','Email', 'Phone', 'Address', 'City', 'Country'];
                        @endphp
                        <x-adminlte-datatable id="table1"
                                              :heads="$heads"
                                              head-theme="light"
                                              theme="light"
                                              striped
                                              hoverable
                                              bordered>
                            @foreach($company->customers as $row)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td>{!! $row->fullName !!}</td>
                                    <td>{!! $row['email'] !!}</td>
                                    <td>{!! $row['phone'] !!}</td>
                                    <td>{!! $row['address'] !!}</td>
                                    <td>{!! $row['city'] !!}</td>
                                    <td>{!! $row['country'] !!}</td>
                                </tr>
                            @endforeach
                        </x-adminlte-datatable>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
@stop
