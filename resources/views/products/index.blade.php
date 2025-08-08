@extends('app')

@section('content')
    <h2>Liste des produits</h2>
     <a href="{{ route('products.create') }}">Ajouter un nouveau produit</a>
     <products-List />
@endsection
