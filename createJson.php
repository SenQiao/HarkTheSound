<?php 



//don't allow override
//create new ones
//prompt user pick another name;

//sound libraby - here are the sound library that are 
//youtube api
//name that tune=time based reward
//Youtube Share button

//tarheel gameplay-> youtube js

// $response = array();
$Type=$_POST['TypeofSongName'];
$Answer=$_POST['Answer'];
$Url=$_POST['Prompt'];
$Timez=$_POST['Timez'];

$Name=str_replace(' ', '_', $Answer);


$response["Between_Rounds"]=["Now try these!"];
$response["Choices_per_round"]=4;
$response["Description"]="A New Hark the Sound Song guessing game.";
$response["Name"]="NameThatSong";
$response["Pair_answers_with_prompts"]= false; 
$response["Question"]=["Can you guess the Song?"];
$response["Repeat_rounds"]= false;
// basename($_FILES["fileToUpload"]["Picture"]);
// $Picture=$_POST['Picture'];
// $Prompt=$_POST['Prompt'];

		// $arrayofPrompts["Answer"]=["Amazing Grace"];
		// $arrayofPrompts["Hint"]=[];
		// $arrayofPrompts["Name"]="Amazing_Grace";

$arrayPrompts=array();

	for ($i=0; $i<count($Name);$i++){
		$tempPrompts["Answer"]=[$Answer[$i],$Timez[$i]];
	    $tempPrompts["Hint"]=[];
	    $tempPrompts["Name"]=$Name[$i];
	    $tempPrompts["Picture"]=[""];
		$cleanurl=str_replace('https://', '', $Url[$i]);

		$cleanurl=str_replace('www.youtube.com/watch?v=', '', $cleanurl);

		$cleanurl=str_replace('https://youtu.be/', '', $cleanurl);

	    $tempPrompts["Prompt"]=[$cleanurl];
		array_push($arrayPrompts, $tempPrompts);
	}

// $response->Things=[$tempPrompts];
$response["Things"]=$arrayPrompts;

if (!in_array('.json',$Type)){
	$Type=$Type.'.json';
}


$fp = fopen($Type, 'w');
fwrite($fp, json_encode($response, JSON_UNESCAPED_SLASHES));
fclose($fp);

$newURL='FixClass.html';
header('Location: '.$newURL);
?> 