@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Add customer</h1>
@stop
@php
    $countries = config('constants.COUNTRIES');
@endphp
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add customer form</h3>
        </div>
        <form method="post" action="{{ route('customer.create') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="first_name" label="First name" placeholder="First name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="last_name" label="Last name" placeholder="Last name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="email" type="email" label="Email" placeholder="mail@example.com"/>
                <x-adminlte-input name="phone" label="Phone"/>
                <x-adminlte-input name="address" label="Address">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-purple">
                            <i class="fas fa-address-card"></i>
                        </div>
                    </x-slot>
                    <x-slot name="bottomSlot">
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="city" label="City"/>
                <x-adminlte-input name="region" label="Region"/>
                <x-adminlte-select name="country" label="Country">
                    <x-adminlte-options :options="$countries"
                                        empty-option="Select a country..."/>
                </x-adminlte-select>
                <x-adminlte-input name="postal_code" label="Postal Code" placeholder="postal code"
                                  enable-old-support>
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-olive">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                    </x-slot>
                    <x-slot name="bottomSlot">
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="success"
                                   icon="fas fa-lg fa-save"/>
                <x-adminlte-button class="btn-flat" type="reset" label="Reset" theme="outline-danger"
                                   icon="fas fa-lg fa-trash"/>
                <x-adminlte-button class="btn-flat" label="Back" theme="info" icon="fas fa-arrow-circle-left"/>
            </div>
        </form>
@endsection
