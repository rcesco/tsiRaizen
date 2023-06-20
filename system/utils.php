<?php

	class Utils
	{
		public function sortArray($arr, $orderBy)
		{
			foreach( $arr as $arraySort )
			{
				foreach( $arraySort as $key => $val )
				{
					if(!isset($sortArray[$key])){
						$sortArray[$key] = array();
					}
					$sortArray[$key][] = $val;		
				}
			}
			
			array_multisort($sortArray[$orderBy], SORT_ASC,  $arr); 
			
			return $arr;
			
		}
		
		public function buscarLogo( $id )
		{
			if( $id == 2941 || $id == 2942 || $id == 3171 || $id == 6609 || $id == 3175 || $id == 3367 || $id == 3507 
				 || $id == 3365 || $id == 3038 || $id == 3403 || $id == 4153 
			)
			{
				$logo = "ipiranga.png";
			}
			elseif ( $id == 2968 || $id == 3570 || $id == 4613 || $id == 5018 || $id == 5019 || $id == 6309 || $id == 6244 
						 || $id == 6243 || $id == 6216 || $id == 5022 || $id == 2996 || $id == 6700
					 )
			{
				$logo = "ciapetro.png";
			}
			elseif ( $id == 748 || $id == 2077 || $id == 2171 || $id == 2174 || $id == 4645 || $id == 2053 || $id == 5924 )
			{
				$logo = "biosev.png";
			}
			elseif ( $id == 6310 || $id == 6727 )
			{
				$logo = "tower.png";
			}
			elseif ( $id == 3664 )
			{
				$logo = "Transo.jpg";
			}
			else
			{
				$logo = "petroleo.jpg";
			}
			
			return $logo;
		}
		
		
		
		
	}

?>