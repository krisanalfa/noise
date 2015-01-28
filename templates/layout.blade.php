@extends('skeleton2')

@section('pagetitle')
    Noise&trade;
@stop

@section('customcss')
    <link href="{{ Theme::base('assets/css/style.css') }}" rel="stylesheet">
@stop

@section('sidebar')
    <aside class="sidebar">
        <nav class="navbar row">
            <div class="span-12 navsearch">
                <input type="text" tabindex="-1" placeholder="{{ l('Search') }} {{ l('Menu') }} ...">
            </div>
        </nav>
        <div class="scroll scroll-navbar">
            <ul class="listview">
                <li class="list-group-container">
                    <h5>{{ l('Input') }}</h5>
                    <ul class="list-group">
                        <li class="plain">
                            <a href="{{ URL::site('/user') }}">
                                <i class="xn xn-user xn-lg"></i> <span>{{ l('User') }}</span>
                            </a>
                        </li>
                        <!-- <li class="plain">
                            <a href="{{ URL::site('/token') }}">
                                <i class="xn xn-lock xn-lg"></i> <span>{{ l('Token') }}</span>
                            </a>
                        </li> -->
                        <!-- <li class="plain">
                            <a href="{{ URL::site('/forum') }}">
                                <i class="xn xn-comments xn-lg"></i> <span>{{ l('Forum') }}</span>
                            </a>
                        </li> -->
                        <li class="plain">
                            <a href="{{ URL::site('/thread') }}">
                                <i class="xn xn-bookmark xn-lg"></i> <span>{{ l('Thread') }}</span>
                            </a>
                        </li>
                        <li class="plain">
                            <a href="{{ URL::site('/post') }}">
                                <i class="xn xn-comment xn-lg"></i> <span>{{ l('Post') }}</span>
                            </a>
                        </li>
                        <li class="plain">
                            <a href="{{ URL::site('/vote') }}">
                                <i class="xn xn-thumbs-up xn-lg"></i> <span>{{ l('Vote') }}</span>
                            </a>
                        </li>
                        <li class="plain">
                            <a href="{{ URL::site('/api') }}">
                                <i class="xn xn-gears xn-lg"></i> <span>{{ l('Api') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
@stop

@section('menumore')
@stop

@section('tabssearch')
@stop

@section('menu')
@stop
