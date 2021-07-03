<?php

	class MY_Controller extends CI_Controller

	{

		function __construct()
		{

			parent::__construct();
	       
			$language ="english";
			$this->config->set_item('language', $language);
			$this->lang->load(array('site'), $language);

		}

	}



?>



    