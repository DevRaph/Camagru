<?php 

	class Auth
	{	
		static function isLogged()
		{
			if (isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']))
				return (true);
			else
				return (false);
		}
	}
