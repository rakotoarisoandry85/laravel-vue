@extends('app')
@section('content')
<div class="flex flex-col flex-1 gap-2">

            <div class="inline-flex items-start flex-wrap gap-3">
              @foreach ($produits as $produit)
            <div>
                <ul class="list-disc">
                    <li>{{ $produit->name_product }}</li>
                    <li>{{$produit->description}}</li>
                    <li>{{ $produit->detail_price }}</li>
                </ul>
            </div>
              @endforeach
            </div>

</div>
@endsection
