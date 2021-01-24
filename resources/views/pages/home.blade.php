@extends('layouts.app')

@section('title', 'Satpol PP Kabupaten Lebak')

@section('content')
<main>
    <header>
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 col-lg-6">
                    <h2>Satpol PP <br> Kabupaten Lebak</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, vero, quis officia dolore laudantium incidunt commodi voluptate possimus eaque ipsa</p>
                    <a href="#visi" class="btn btn-warning btn-readmore tombol page-scroll">Selengkapnya</a>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="image1">
                        <img src="frontend/images/header Satpol PP.jpg">
                    </div>
                    <div class="image2">
                        <img src="frontend/images/satpol pp2.jpg">
                    </div>

                </div>
            </div>
        </div>
    </header>
    
    <section class="section section-visi" id="visi">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 col-lg-6">
                    <h3 class="text-center">Visi</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam beatae ipsum doloribus possimus porro optio sequi accusantium nam nulla omnis! Fugiat voluptatum ipsam magni ex ipsa, sit nisi. Natus, ut!</p>
                </div>
                <div class="col-12 col-lg-6">
                    <h3 class="text-center">Misi</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate, est totam tempore deleniti veritatis sed perferendis perspiciatis minima dolorem dolorum aliquam distinctio illo, odio veniam praesentium? Error est dolores sapiente.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-about" id="about">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h2>About Us</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa veritatis commodi sapiente mollitia tempore autem fugiat facilis temporibus at itaque placeat consequuntur nobis cupiditate quod dolorum vitae, debitis eos inventore.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, maxime exercitationem sed tenetur incidunt error odio. Fugiat exercitationem temporibus expedita debitis dolorum accusantium perferendis quod rem velit. Tenetur,
                        culpa reprehenderit?</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-gallery" id="gallery">
        <div class="container">
            <div class="row text-center">
                <div class="col mb-3">
                    <h2>Gallery</h2>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-10 col-lg-3">
                    <div class="card card-gallery">
                        <img src="frontend/images/satpol pp2.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-lg-3">
                    <div class="card card-gallery">
                        <img src="frontend/images/satpol pp2.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-lg-3">
                    <div class="card card-gallery">
                        <img src="frontend/images/satpol pp2.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-lg-3">
                    <div class="card card-gallery">
                        <img src="frontend/images/satpol pp2.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
    
