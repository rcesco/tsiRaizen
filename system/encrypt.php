<?php
	class encrypt

	{

		public function setEncrypt($param)

		{

			$crypt = hash('sha256','seduction'.$param.'fon');

			

			return $crypt;

		}	

	}
	
?>