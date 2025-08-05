@extends('app')
@section('content')
<div class="flex flex-col flex-1 gap-2">

            <div class="inline-flex items-start flex-wrap gap-3">
              @foreach ($produits as $produit)
            <div>
                <li>
                    <ul>{{ $produit->name_product }}</ul>
                    <ul>{{$produit->description}}</ul>
                    <ul>{{ $produit->detail_price }}</ul>
                </li>
            </div>
              @endforeach
            </div>

</div>
@endsection
