<?php

class Lion extends Carnivore implements MonInterface{

    public function crier()
    {
        return " je rugis ";
    }

    public function seDeplacer()
    {
        return " je me déplace seul ";
    }

}