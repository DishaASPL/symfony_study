<?php
namespace Nettivene\Service\MovieDetail;

class MovieDetails
{
    Public $title;
    Public $deatils;

    public function getHomepageTitle(): string
    {
        $title = [
            'you can book your favourite movie!',
            'Enjoy coolest movie by booking with us!',
            'select your favorites in just few minutes ',
        ];

        $index = array_rand($title);

        return $title[$index];
    }



    public function getMovieDeatils():Array
    {
        $this->title = "Thor: Love and Thunder";
        $this->deatils = "Thor embarks on a journey unlike anything he`s ever faced, a quest for inner peace.";

        return ['title'=> $this->title,'deatils'=>$this->deatils];
    }



}

