<?php
// Create an associative array with my informations
$array=["firstname"=>"Daniel",
        "lastname"=>'Marta Fernandes',
        "address"=>'255, route des Developeurs',
        "postalCode"=>'1324',
        "city"=>'PHP-City',
        "email"=>'numerical@evaluaion.lu',
        "telephone"=>'+00352 691 123 456',
        "english-Birth date"=>date("d / m / Y", strtotime("1994-04-26"))
        ];

?>

<ul>
<?php 
    // iterate through the associative array to get keys and values
    foreach($array as $key=>$value){
        //how to display a list in HTML with keys and values
        echo '<li>' .$key . ' : ' . $value . '</li>';
    }
    ?>
</ul>