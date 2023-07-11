<?php


namespace App\Providers\Gates; 


class citySiteGate
{

public function deleteLandmarkTest($user, $Landmark_i)
	{
		return ($user->name == 'admin1'); //может удалять локацию с именем test
	}

}



?>
