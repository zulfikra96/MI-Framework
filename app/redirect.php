<?php

class redirect{

	public static function page($page)
	{
		header("location:".URL.$page);
	}

}
