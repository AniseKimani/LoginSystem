<?php
$myarray = array(
    array("Ankit", "Ram", "Shyam"),
    array("Unnao", "Trichy", "Kanpur")
);
    echo "<pre>";
    print_r($myarray);
    echo"</pre>";

$associative = [
    'Joe'=> 22,
    'Adam'=> 25,
    'David'=> 30
];
foreach ($associative as $name => $age){
    echo "My name is $name, and I am $age years old". '<br>';
}

$data =[
    'Game of Thrones' => ['Jaime Lannister', 'Catelyn Stark', 'Cersei Lannister'],
    'Black Mirror' => ['Nanette Cole', 'Selma Telse', 'Karin Parke']
];
echo '<h1>Famous TV Series and Actors</h1>';
foreach ($data as $series => $actors){
    echo '<h2> $series </h2>';
    foreach ($actors as $actor){
        echo "<div>$actor</div>";
    }    
}

?>