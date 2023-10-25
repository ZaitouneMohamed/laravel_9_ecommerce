@extends('electro.layouts.master')

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>About</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- About-Page -->
    <div class="page-about u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-me-info u-s-m-b-30">
                        <h1>Welcome to
                            <span>Canal Informatique</span>
                        </h1>
                        <p>
                            Bienvenue chez Canal Informatique, votre destination en ligne ultime pour tout ce qui concerne
                            l'informatique, les logiciels et les solutions. Nous sommes fiers de vous offrir une expérience
                            de shopping exceptionnelle, où la technologie rencontre l'innovation.
                        </p>
                        <p>
                            Chez Canal Informatique, nous comprenons l'importance cruciale de l'informatique dans notre monde en
                            constante évolution. C'est pourquoi nous nous efforçons de vous offrir une gamme complète de
                            produits informatiques de haute qualité, des composants matériels aux logiciels sophistiqués, en
                            passant par des solutions sur mesure pour répondre à vos besoins professionnels.
                        </p>
                        <p>
                            Notre équipe dévouée travaille sans relâche pour vous proposer les dernières avancées
                            technologiques, des marques renommées et des solutions adaptées à toutes les exigences. Nous
                            croyons en l'accessibilité, en l'efficacité et en la fiabilité, et c'est ce que vous trouverez
                            chez Canal Informatique.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-me-image u-s-m-b-30">
                        <div class="banner-hover effect-border-scaling-gray">
                            <img class="img-fluid" src="{{ asset('assets/electro/images/about/logo.jpeg') }}"
                                alt="About Picture">
                        </div>
                    </div>
                    <div class="about-social text-center u-s-m-b-30">
                        <ul class="social-media-list">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-rss"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About-Page /- -->
@endsection
