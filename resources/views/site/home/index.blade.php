<!--<h1>Home Page do Site - Teste</h1>
{{$teste}} - {{$teste2}} - {{$teste3}}-->

@extends('site.templates.template1')

@section('content')

<h1>Home Page do site!</h1>
{{$var1 or 'Não existe!'}}
{{$xss}}
<!--{!! $xss !!} Cuidado aqui -->

@if($var1 == '1234')
    <p>Igual</p>
@else
    <p>É diferente</p>
@endif

@unless($var1 == 1234)
<p>Não é igual... unless</p>
@endunless

{{--}}
@for($i = 0; $i < 10; $i++)
    <p>Valor: {{$i}}</p>
@endfor
--}}

@foreach($arrayData as $item)
    <p>ForEach: {{$item}}</p>
@endforeach

@forelse ($arrayData as $item)
    <p>ForElse: {{$item}}</p>
@empty
    <p>Não existe itens para ser impressos.</p>
@endforelse

@php
    
@endphp

@include('site.includes.sidebar', compact('var1'))
    
@endsection

@push('scripts')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush