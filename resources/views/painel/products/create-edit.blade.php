@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">
        <a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
        Gestão Produto: <b>{{$product->name or 'Novo'}}</b>
    </h1>

    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    @if( isset($product) )
        <!--<form class="form" method="post" action="{{route('produtos.update', $product->id)}}">
        {!! method_field('PUT') !!}-->
        {!! Form::model($product, ['route' => ['produtos.update', $product->id], 
                                   'class' => 'form', 
                                   'method' => 'put']) !!}
    @else
        <!--<form class="form" method="post" action="{{route('produtos.store')}}">-->
        {!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
        <!-- Quando se faz assim, não precisa passar o csrf_field-->
    @endif
        <!--<input type="text" name="_token" value="{{csrf_token()}}">-->

        <!--{!! csrf_field() !!}-->

        <div class="form-group">
            <!--<input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product->name or old('name')}}">-->
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>

        <div class="form-group">
            <!--<input type="text" name="number" placeholder="Número:" class="form-control" value="{{$product->number or old('number')}}">-->
            {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Número:']) !!}
        </div>

        <div class="form-group">
            <label>
                <!--<input type="checkbox" name="active" value="1" @if( isset($product) && $product->active == '1') checked @endif>Ativo-->
                {!! Form::checkbox('active') !!}
                Ativo
            </label>
        </div>

        <div class="form-group">
            <input type="text" name="image" placeholder="Caminho da imagem:" class="form-control" value="{{$product->image or old('image')}}">
        </div>
        
        <div class="form-group">
            <!--<select name="category" id="" class="form-control">
                <option value="">Escolha a Categoria</option>
                @foreach($categorys as $category)
                    <option value="{{$category}}"
                        @if( isset($product) && $product->category == $category )
                            selected
                        @endif
                    >{{$category}}</option>
                @endforeach
            </select>-->
            {!! Form::select('category', $categorys, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <!--<textarea name="description" placeholder="Descrição" class="form-control">{{$product->description or old('description')}}</textarea>-->
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
        </div>
        
        <!--<button class="btn btn-primary">Enviar</button>-->
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <!--</form>-->
    {!! Form::close() !!}
@endsection