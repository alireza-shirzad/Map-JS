
<?php


        $file = fopen("LatLong" . $_GET['hour'] . ".csv","r");
        $width = $_GET['width'];
        $height = $_GET['height'];
        

        $point=[];


        $i = 1;
        while (($line = fgetcsv($file)) !== FALSE) {
            
            if($i!=1){

                for ($j=1 ; $j < 4 ; $j++) {
                    
                    array_push($point, (object)['y'=>floor((-floatval($line[1])+39.977)*$height/9+$height/13),
                                                'x'=>floor((floatval($line[2])-43.879)*$width/20),
                                                'value'=>floatval($line[3])]);
                                                

                }
            }
            $i++;
        }

        $d = json_encode($point);

        echo $d;
        
        fclose($file);
    ?>