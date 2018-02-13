<?php
class Converte {
    public $saidaBin;
    public $saidaDec;
    public $saidaHex;
    public $saidaWieg;
    
    
    public function converter( $entrada ){
        /* Bin > Bin */
        $this->saidaBin = $entrada;
        /* Bin > Dec */
        $this->saidaDec = base_convert($entrada, 2, 10);
        /* Bin > Hex */
        $this->saidaHex = strtoupper( base_convert($entrada,2,16));
        /* Bin > Wieg */
        $fc = base_convert( substr($entrada, -26, -16), 2, 10 );
        $id = base_convert( substr($entrada, -16, 16), 2, 10 );
                
        $this->saidaWieg = "FC: ".$fc." ID: " .$id;
        
        return array();
        
    } /* fim do converter */
    
}  /* fim classe */