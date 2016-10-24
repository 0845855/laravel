@extends('layouts.master')

@section('title')
    De 24/7 Gamenieuws website!
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-8 blog-main">

            @foreach ($news as $item)

                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="news">{{ $item->title }}</a></h2>
                    <p class="blog-post-meta">{{ $item->created_at }} door <a href="#">Robin van Leeuwen</a></p>

                    <p>{{ $item->introduction }} <a href="news/{{ $item->id }}">Lees meer...</a></p>

                </div><!-- /.blog-post -->

            @endforeach

            <div class="blog-post">
                <h2 class="blog-post-title"><a href="news">Games with Gold in oktober 2016 bevat o.a. The Escapists en I Am Alive</a></h2>
                <p class="blog-post-meta">21 september 2016 door <a href="#">Robin van Leeuwen</a></p>

                <p>Hoewel het nog zo'n anderhalve week duurt voordat de maand oktober van start gaat, heeft Microsoft zojuist alvast onthuld welke gratis games Xbox Live Gold-abonnees volgende maand mogen verwachten. Zoals gebruikelijk zijn dit weer twee Xbox One- en twee Xbox 360-games. <a href="news">Lees meer...</a></p>

            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title"><a href="news">Games with Gold in oktober 2016 bevat o.a. The Escapists en I Am Alive</a></h2>
                <p class="blog-post-meta">21 september 2016 door <a href="#">Robin van Leeuwen</a></p>

                <p>Hoewel het nog zo'n anderhalve week duurt voordat de maand oktober van start gaat, heeft Microsoft zojuist alvast onthuld welke gratis games Xbox Live Gold-abonnees volgende maand mogen verwachten. Zoals gebruikelijk zijn dit weer twee Xbox One- en twee Xbox 360-games. <a href="news">Lees meer...</a></p>

            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title"><a href="news">Games with Gold in oktober 2016 bevat o.a. The Escapists en I Am Alive</a></h2>
                <p class="blog-post-meta">21 september 2016 door <a href="#">Robin van Leeuwen</a></p>

                <p>Hoewel het nog zo'n anderhalve week duurt voordat de maand oktober van start gaat, heeft Microsoft zojuist alvast onthuld welke gratis games Xbox Live Gold-abonnees volgende maand mogen verwachten. Zoals gebruikelijk zijn dit weer twee Xbox One- en twee Xbox 360-games. <a href="news">Lees meer...</a></p>

            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title">Games with Gold in oktober 2016 bevat o.a. The Escapists en I Am Alive</h2>
                <p class="blog-post-meta">21 september 2016 door <a href="#">Robin van Leeuwen</a></p>

                <p>Hoewel het nog zo'n anderhalve week duurt voordat de maand oktober van start gaat, heeft Microsoft zojuist alvast onthuld welke gratis games Xbox Live Gold-abonnees volgende maand mogen verwachten. Zoals gebruikelijk zijn dit weer twee Xbox One- en twee Xbox 360-games. <a href="news">Lees meer</a></p>

            </div><!-- /.blog-post -->

            <div class="blog-post">
                <h2 class="blog-post-title">Games with Gold in oktober 2016 bevat o.a. The Escapists en I Am Alive</h2>
                <p class="blog-post-meta">21 september 2016 door <a href="#">Robin van Leeuwen</a></p>

                <p>Hoewel het nog zo'n anderhalve week duurt voordat de maand oktober van start gaat, heeft Microsoft zojuist alvast onthuld welke gratis games Xbox Live Gold-abonnees volgende maand mogen verwachten. Zoals gebruikelijk zijn dit weer twee Xbox One- en twee Xbox 360-games. <a href="news">Lees meer</a></p>

            </div><!-- /.blog-post -->

            <nav>
                <ul class="pager">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->
@endsection