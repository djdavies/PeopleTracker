<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(GoogleResultsDanielDavies::class);
    	$this->call(GoogleResultsDanielDaviesCardiff::class);
    	$this->call(GoogleResultsDanielDaviesCardiffUniversity::class);
    	$this->call(GoogleResultsDanielDaviesJake::class);
        $this->call(GoogleResultsJianhuaShao::class);
        $this->call(GoogleResultsJianhuaShaoCardiff::class);
        $this->call(GoogleResultsJianhuaShaoCardiffUniversity::class);
        // $this->call(GoogleResultsLinusTorvalds::class);
        $this->call(GoogleResultsMichaelJuckes::class);
        $this->call(GoogleResultsMichaelJuckesCardiff::class);
        $this->call(GoogleResultsMichaelJuckesCardiffUniversity::class);
        $this->call(GoogleResultsMichaelPaulJuckes::class);
        $this->call(GoogleResultsOliverCumming::class);
        $this->call(GoogleResultsOliverCummingCardiff::class);
        $this->call(GoogleResultsOliverCummingCardiffUniversity::class);
        $this->call(GoogleResultsRachelLyon::class);
        $this->call(GoogleResultsRachelLyonCardiff::class);
        $this->call(GoogleResultsRachelLyonTherapies::class);
        $this->call(GoogleResultsWendyIvins::class);
        $this->call(GoogleResultsWendyIvinsCardiff::class);
        $this->call(GoogleResultsWendyIvinsCardiffUniversity::class);
    }
}
