@extends('template.index')
@section("title", "Artikel")
@section('content')
@foreach ($data_article as $dta)
<!-- Header -->
<header class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1>Detal Artikel</h1>
            </div>
        </div>
    </div>
</header>
<!-- end of header -->

@foreach ($data_article as $dta)


<!-- Basic -->
<div class="ex-basic-1 pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h2 class="mb-4">{{$dta->title}}</h2>
                <img width="80%" class="mb-3" src="{{$dta->image_url}}" alt="alternative">
                <p>{{$dta->content}}</p>

            </div>
        </div>
    </div>
</div>
<!-- end of basic -->
@endforeach


<!-- Basic -->

<!-- end of basic -->
@endforeach
@endsection