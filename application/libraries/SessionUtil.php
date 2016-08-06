<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionUtil
{
	
	static function startSession(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}
	
	static function isLoggedIn(){
		SessionUtil::startSession();
		return SessionUtil::get('logged_in');
	}
	
	static function setAuthenticatedUser($user)
    {
    	SessionUtil::startSession();
		unset($user->password);
		$_SESSION[CuConfig::$prefix . 'logged_in'] = true;
		$_SESSION[CuConfig::$prefix . 'user'] = $user; 
    }
	
	static function setLastVisitedPage($link)
    {
    	SessionUtil::startSession();
    	$_SESSION[CuConfig::$prefix . 'lastVisitedPage'] = $link;
    }
	
	static function getLastVisitedPage()
    {
    	SessionUtil::startSession();
    	$link = SessionUtil::get('lastVisitedPage');
    	$_SESSION[CuConfig::$prefix . 'lastVisitedPage'] = null;
    	return $link;
    }
	
	static function getUser() 
    {
    	SessionUtil::startSession();
    	$user = SessionUtil::get('user');
    	if ($user == null)
    	{
    		$user = (object)array('username' => '', 'email' => '');
    	}
		return $user;
    }
	
	static function get($key)
	{
		//Initially, CodeIgniter's session handling was used but we 
		//encountered issues such as unexpected loss of session data, like
		//reserving a class schedule; this is okay in student account, but
		//not okay in admin account (thru impersonation).
		//see this; http://stackoverflow.com/questions/2449118/codeigniter-session-data-not-available-in-other-pages-after-login
		//Therefore we are reverting to the usage of native PHP Session,
		//which works well.
		$keyWithPrefix = CuConfig::$prefix . $key;
		return !empty($_SESSION[$keyWithPrefix]) ? $_SESSION[$keyWithPrefix] : null;
	}
	
	static function destroy()
    {
		$email = self::getUser()->email;
		
		//source: http://stackoverflow.com/questions/508959/truly-destroying-a-php-session
    	SessionUtil::startSession();
		$_SESSION = array();
		if (isset($_COOKIES[session_name()])) { 
            $params = session_get_cookie_params();
            setcookie(session_name(), '', 1, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
        }
		session_destroy();
        session_start();
        if (!isset($_SESSION['CREATED'])) {
            // invalidate old session data and ID
            session_regenerate_id(true);
            $_SESSION['CREATED'] = time();
        }
		
		$user = new stdClass();
		$_SESSION[CuConfig::$prefix . 'logged_in'] = null;
		$_SESSION[CuConfig::$prefix . 'user'] = $user;
    }
	
}

/* End of file SessionUtil.php */
/* Location: ./application/libraries/SessionUtil.php */