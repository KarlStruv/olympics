<?php

$track = [];
$players = [];
$playerCount = (int)readline("Enter the player amount: ");
$characters = str_split("abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()'");
$randomID = array_rand($characters, $playerCount);

foreach ($randomID as $ID){
    array_push($players, $characters[$ID]);
}

$turn = 1;
$startPosition = 0;
$stepArray = array_fill(0, $playerCount, 0);
$winners = [];

for ($p = 0; $p < $playerCount; $p++){
    for ($m = 0; $m < 101; $m++){
        array_push($track, "_");
    }
}


while($turn > 0){
    for ($i = 0; $i < count($track) - $playerCount - 1; $i++) {

        if ($i % 100 === 0) {
            echo PHP_EOL;
        }
        echo $track[$i];
    }

    time_nanosleep(0, 150000000);
    foreach ($players as $key => $player) {


        $stepArray[$key] += rand(1,2);
        $startPosition = $key * 100;
        $currentPosition = $startPosition + $stepArray[$key];
        $previousPosition = $key * 100 + $stepArray[$key];
        /////// Nevermind the -1/-2...
        $track[$previousPosition - 1] = "_";
        $track[$previousPosition - 2] = "_";
        $track[$currentPosition] = $player;

        echo " " . PHP_EOL;
        echo " " . PHP_EOL;



        if ($currentPosition >= $startPosition + 99 ){
            (array_push($winners, $player));



            foreach ($winners as $winnerKey => $winner){

                echo $winnerKey+1 . ". $winner" . PHP_EOL;
            }
            $winners = array_unique($winners);
            if(count($winners) >= $playerCount){
                exit;
            }
        }

    }



    $turn++;
    echo " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL;
    echo " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL;
    echo " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL;
    echo " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL . " " . PHP_EOL;
}




