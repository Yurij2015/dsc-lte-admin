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
    $config['paging'] = false;
    $config['searching'] = false;
    $config['info'] = false;
    $countries = config('constants.COUNTRIES');

@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-button label="Add customer (modal)" data-toggle="modal" data-target="#modal-ad-customer"
                                       class="bg-teal float-right ml-3"/>
                    <a href="{{ route('customer.create.form') }}" class="btn bg-primary float-right mb-3">
                        Add customer</a>
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light" theme="light" striped hoverable
                                          bordered :config="$config">
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
    <x-adminlte-modal id="modal-ad-customer" title="Create customer" size="lg" theme="teal"
                      icon="fas fa-user" v-centered static-backdrop scrollable>
        <form action="{{ route('customer.create') }}" method="POST" enctype="multipart/form-data" id="add-customer-form">
            <!-- Modal body -->
            <div class="modal-body">
                @csrf
                <div class="card-body">
                    <x-adminlte-input name="first_name" label="First name" value="{{ old('first_name') }}"
                                      placeholder="First name">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-input name="last_name" label="Last name" value="{{ old('last_name') }}"
                                      placeholder="Last name">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-input name="email" type="email" label="Email" value="{{ old('email') }}"
                                      placeholder="mail@example.com"/>
                    <x-adminlte-input name="phone" label="Phone" value="{{ old('phone') }}"/>
                    <x-adminlte-input name="address" label="Address" value="{{ old('address') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-purple">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </x-slot>
                        <x-slot name="bottomSlot">
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-input name="city" label="City" value="{{ old('city') }}"/>
                    <x-adminlte-input name="region" label="Region" value="{{ old('region') }}"/>
                    <x-adminlte-select name="country" label="Country">
                        <x-adminlte-options :options="$countries" :selected="old('country')"
                                            empty-option="Select a country..."/>
                    </x-adminlte-select>
                    <x-adminlte-input name="postal_code" label="Postal Code" placeholder="postal code"
                                      enable-old-support value="{{ old('postal_code') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-olive">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                        </x-slot>
                        <x-slot name="bottomSlot">
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>
                                    <button type="submit" class="btn btn-primary">Save</button>

            <x-slot name="footerSlot">
                <x-adminlte-button class="mr-auto" type="submit" theme="success" label="Save"/>
                <x-adminlte-button theme="danger" label="Close" data-dismiss="modal"/>
            </x-slot>
        </form>
    </x-adminlte-modal>
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/customer.js') }}" defer></script>
@stop
