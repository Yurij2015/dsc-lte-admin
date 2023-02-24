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
                    <p class="mb-0">You are logged in!</p>

                    {{-- Minimal --}}
                    <x-adminlte-select2 name="sel2Basic">
                        <option>Option 1</option>
                        <option disabled>Option 2</option>
                        <option selected>Option 3</option>
                    </x-adminlte-select2>

                    {{-- Disabled --}}
                    <x-adminlte-select2 name="sel2Disabled" disabled>
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </x-adminlte-select2>

                    {{-- With prepend slot, label and data-placeholder config --}}
                    <x-adminlte-select2 name="sel2Vehicle" label="Vehicle" label-class="text-lightblue"
                                        igroup-size="lg" data-placeholder="Select an option...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <option/>
                        <option>Vehicle 1</option>
                        <option>Vehicle 2</option>
                    </x-adminlte-select2>

                    {{-- With multiple slots, and plugin config parameter --}}
                    @php
                        $config = [
                            "placeholder" => "Select multiple options...",
                            "allowClear" => true,
                        ];
                    @endphp
                    <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Categories"
                                        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                        </x-slot>
                        <option>Sports</option>
                        <option>News</option>
                        <option>Games</option>
                        <option>Science</option>
                        <option>Maths</option>
                    </x-adminlte-select2>
                    {{-- Minimal --}}

                    <x-adminlte-button label="Button"/>

                    {{-- Disabled --}}
                    <x-adminlte-button label="Disabled" theme="dark" disabled/>

                    {{-- Themes + icons --}}
                    <x-adminlte-button label="Primary" theme="primary" icon="fas fa-key"/>
                    <x-adminlte-button label="Secondary" theme="secondary" icon="fas fa-hashtag"/>
                    <x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle"/>
                    <x-adminlte-button label="Warning" theme="warning" icon="fas fa-exclamation-triangle"/>
                    <x-adminlte-button label="Danger" theme="danger" icon="fas fa-ban"/>
                    <x-adminlte-button label="Success" theme="success" icon="fas fa-thumbs-up"/>
                    <x-adminlte-button label="Dark" theme="dark" icon="fas fa-adjust"/>

                    {{-- Types --}}
                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                                       icon="fas fa-lg fa-save"/>
                    <x-adminlte-button class="btn-lg" type="reset" label="Reset" theme="outline-danger"
                                       icon="fas fa-lg fa-trash"/>
                    <x-adminlte-button class="btn-sm bg-gradient-info" type="button" label="Help"
                                       icon="fas fa-lg fa-question"/>

                    {{-- Icons Only --}}
                    <x-adminlte-button theme="primary" icon="fab fa-fw fa-lg fa-facebook-f"/>
                    <x-adminlte-button theme="info" icon="fab fa-fw fa-lg fa-twitter"/>
                </div>
            </div>
        </div>
    </div>
@stop

