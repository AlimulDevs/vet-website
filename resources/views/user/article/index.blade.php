@extends('template.index')
@section("title", "Artikel")
@section('content')
<!-- Search -->
<div class="search bg-gray">
    <div class="container">





        <div class="text-container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="searchInput" class="form-control-input" placeholder="Apa yang kamu ingin tahu">
                            <button class="btn-solid-sm" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Article -->
<div id="projects" class="filter">
    <div class="container">
        <!-- <div class="row">
                    <div class="col-lg-12">
                        <h2 class="h2-heading">Artikel Kesehatan</h2>
                    </div> 
                </div>  -->
        <div class="row">
            <div class="col-lg-12">

                <div class="button-group filters-button-group">
                    <button class="button is-checked" data-filter="*">Semua</button>

                    @foreach ($data_category_article as $dtca)
                    <button class="button" data-filter=".{{$dtca->name}}">{{$dtca->name}}</button>
                    @endforeach


                </div>

                <div class="grid">

                    @foreach ($data_article as $dta)


                    <div class="element-item {{$dta->category_article->name}}" name="data">
                        <a href="/user/article-detail/{{$dta->id}}">
                            <img class="img-fluid" src="{{$dta->image_url}}" alt="alternative">
                            <p><strong>{{$dta->author_name}}</strong> - {{$dta->title}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    // Mendapatkan elemen input dan kontainer data
    var searchInput = document.getElementById('searchInput');
    var dataItems = document.getElementsByName('data');

    // Mendefinisikan fungsi filter
    function filter() {
        // Mendapatkan nilai input pencarian
        var searchTerm = searchInput.value.toLowerCase();


        // Iterasi melalui setiap elemen data dan memeriksa kesesuaian dengan kata kunci pencarian
        for (var i = 0; i < dataItems.length; i++) {
            var dataItem = dataItems[i];
            var data = dataItem.textContent.toLowerCase();

            // Menyembunyikan atau menampilkan elemen data berdasarkan kesesuaian dengan kata kunci pencarian
            if (data.includes(searchTerm)) {
                dataItem.style.display = 'block'; // Menampilkan elemen data
            } else {
                dataItem.style.display = 'none'; // Menyembunyikan elemen data
            }
        }
    }

    // Memanggil fungsi filter saat nilai input berubah
    searchInput.addEventListener('input', filter);
</script>

<!-- end of article -->
@endsection