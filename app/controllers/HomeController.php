<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	public function getIndex()
	{
		return $this->layout->nest('content', 'hello');
	}

}
