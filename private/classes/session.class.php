<?php

class Session
{

  private $member_id;
  public $username;
  private $last_login;

  public const MAX_LOGIN_AGE = 60 * 60 * 24;

  public function __construct()
  {
    session_start();
    $this->check_stored_login();
  }

  public function login($member)
  {
    if ($member) {
      //Prevents session fixation attacks
      session_regenerate_id();
      $this->member_id = $_SESSION['member_id'] = $member->id;
      $this->username = $_SESSION['username'] = $member->username;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  public function is_logged_in()
  {
    return isset($this->member_id);
  }

  public function log_out()
  {
    unset($_SESSION['member_id']);
    unset($_SESSION['username']);
    unset($_SESSION['last_login']);
    unset($this->member_id);
    unset($this->username);
    unset($this->last_login);
    return true;
  }

  private function check_stored_login()
  {
    if (isset($_SESSION['member_id'])) {
      $this->member_id = $_SESSION['member_id'];
      $this->username = $_SESSION['username'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  /* private function last_login_is_recent()
  {
    if (!isset($this->last_login)) {
      return false;
    } elseif (($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  } If implementing this in addition to is_logged in conditional, the note additional configuration is needed to still display page if conditional returns false*/

  public function message($msg = "")
  {
    if (!empty($msg)) {
      // If empty then is a set message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      //This is a get message
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message()
  {
    unset($_SESSION['message']);
  }
}
