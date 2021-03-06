<?php
	
function display_nav($int){
	$home=' ';
	$about=' ';
	$contact=' ';
	$login='class="dropdown"';
	$regOpt='';
	session_start();
	if (isset($_SESSION['user_email']))
	{
		$logOpt = '<li><a href="/account/logout">Log Out</a></li>';
		if ($_SESSION['user_isAdmin']==1){
			$adminOpt= '<li><a href="/manage">Manage Courses</a></li>';
		}
	}else{
		$logOpt = '<li><a href="/account">Log In</a></li>';
		$regOpt = '<li><a href="/account/register">Register</a></li>';
	}
	//Conditional to check if user stored
	$log_option='Sign In';
	if($int==0){
		$home='class="active"';
	}else if($int==1){
		$about='class="active"';
	}else if($int==2){
		$contact='class="active"';
	}else if($int==4){
		$login=' class="active dropdown"';
	}
return <<<HTML
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Forward Degree</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li {$home}><a href="/">View Courses</a>
			</li>
            <li {$about}><a href="/index/about">About</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
            <li {$login}><a href="" data-toggle="dropdown">Account</a>
				<ul class="dropdown-menu">
					{$adminOpt}
					{$regOpt}
					{$logOpt}
				</ul>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
HTML;
}
?>