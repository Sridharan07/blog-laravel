<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;

use App\Setting;


class AdminComposer
{
	public function compose(View $view){

		$view->with('site_setting', $this->site_setting());


	}
	
	private function site_setting(){
		return Setting::first();
	}




}

