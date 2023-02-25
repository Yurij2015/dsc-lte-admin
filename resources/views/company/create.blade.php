@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Add company</h1>
@stop
@php
    $countries = config('constants.COUNTRIES');
@endphp
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add company form</h3>
        </div>
        <form method="post" action="{{ route('company.create') }}">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="name" label="Company name" value="{{ old('name') }}"
                                  placeholder="Company name">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-building"></i>
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
                <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="success"
                                   icon="fas fa-lg fa-save"/>
                <x-adminlte-button class="btn-flat" type="reset" label="Reset" theme="outline-danger"
                                   icon="fas fa-lg fa-trash"/>
                <a href="{{ route('companies.index') }}">
                    <x-adminlte-button class="btn-flat" label="Back" theme="info" icon="fas fa-arrow-circle-left"/>
                </a>
            </div>
        </form>
@endsection
