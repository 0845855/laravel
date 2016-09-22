@extends('layouts.master')

@section('title')
    De 24/7 Gamenieuws website!
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">Games with Gold in oktober 2016 bevat o.a. The Escapists en I Am Alive</h2>
                <p class="blog-post-meta">21 september 2016 door <a href="#">Robin van Leeuwen</a></p>

                <p>Hoewel het nog zo'n anderhalve week duurt voordat de maand oktober van start gaat, heeft Microsoft zojuist alvast onthuld welke gratis games Xbox Live Gold-abonnees volgende maand mogen verwachten. Zoals gebruikelijk zijn dit weer twee Xbox One- en twee Xbox 360-games.</p>

                <p>Gedurende de gehele maand oktober kunnen Xbox One-gamers met een Gold-abonnement Super Mega Baseball: Extra Innings gratis aan hun catalogus toevoegen. Tussen 16 oktober en 15 november kunnen zij daarnaast ook The Escapists downloaden.</p>

                <p>Voor Xbox 360-gamers staat tussen 1 en 15 oktober I Am Alive op het programma. Van 16 tot en met 31 oktober kunnen zij daarnaast de racegame MX vs ATV Reflex aan hun bibliotheek toevoegen. Overigens kunnen ook Xbox One-gamers van deze twee spellen meeprofiteren, want zowel MX vs ATV Reflex als I Am Alive zijn op de Xbox One te spelen middels de Backward Compatibility-functionaliteit. </p>
            </div><!-- /.blog-post -->
            <br/>
            <hr>

            <h3>Reacties</h3></b>

            <div class="user_reply" style="min-height:120px;">
                <div class="name" style="float:left;"><p>Robin</p></div>
                <div class="avatar" style="float:left;">
                    <img src="http://i.imgur.com/Whp9NWg.png"/>
                </div>
                <div class="reply" style="float: left; width: 70%;margin-left: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>

            </div>

            <div class="clearfix" style="display: inline-block;"></div>

            <div class="user_reply" style="min-height:120px;">
                <div class="name" style="float:left;"><p>Robin</p></div>
                <div class="avatar" style="float:left;">
                    <img src="http://i.imgur.com/Whp9NWg.png"/>
                </div>
                <div class="reply" style="float: left; width: 70%;margin-left: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>

            </div>

            <div class="clearfix" style="display: inline-block;"></div>

            <div class="user_reply" style="min-height:120px;">
                <div class="name" style="float:left;"><p>Robin</p></div>
                <div class="avatar" style="float:left;">
                    <img src="http://i.imgur.com/Whp9NWg.png"/>
                </div>
                <div class="reply" style="float: left; width: 70%;margin-left: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>

            </div>

            <hr>

            <div class="create-reply">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="text">Nieuwe reactie</label>
                        <textarea class="form-control" type="text" name="reply" id="reply"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Verzenden</button>
                </form>
            </div>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module">
                <img src="http://static.zoom.nl/C086D403DEB900323D43A530AAE111E2-image-jpg.jpg" />
            </div>
            <div class="sidebar-module">
                <img src="http://static.zoom.nl/C086D403DEB900323D43A530AAE111E2-image-jpg.jpg" />
            </div>

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
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->
@endsection