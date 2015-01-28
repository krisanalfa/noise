@extends('layout')

<?php use ROH\Util\Inflector; ?>

@section('pagetitle')
    {{ l('Create New ' . Inflector::humanize(f('controller')->getClass())) }}
@stop

@section('back')
    <a href="{{ f('controller.url') }}" class="direct"><i class="xn xn-angle-left"></i> {{ l('Back') }}</a>
@stop

@section('tabssearch')
@stop

@section('menu')
@stop

@section('content')
    <form method="post" class="form contextual">
        <div class="scroll scroll-navbar">
            @section('fields')
                @foreach (f('controller')->schema() as $name => $field)
                    @if (!$field['hidden'] and !$field['generated'])
                        <div class="row {{ (f('notification.message', $name) AND $app->request->getMethod() !== 'GET') ? 'has-error' : ''}}">
                            <div class="span-3">{{ $field->label() }}</div>
                            <div class="span-9">{{ $entry->format($name, 'input') }}</div>
                            <span class="help-block">{{ f('notification.message', $name) }}</span>
                        </div>
                    @endif
                @endforeach
            @show
        </div>

        @section('contextual')
            <nav class="navbar navbar-bottom row">
                <div class="span-6">
                    &nbsp;
                </div>
                <div class="span-6 align-right">
                    <button type="reset" class="button button-outline"><i class="xn xn-refresh"></i>{{ l('Reset') }}</button>
                    <button type="submit" class="button success solid"><i class="xn xn-save"></i>{{ l('Save') }}</button>
                </div>
            </nav>
        @show
    </form>
@endsection

