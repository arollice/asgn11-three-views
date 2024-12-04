<?php

class Session
{

  private $member_id;

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
      $_SESSION['member_id'] = $member->id;
      $this->member_id = $member->id;
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
    unset($this->member_id);
    return true;
  }

  private function check_stored_login()
  {
    if (isset($_SESSION['member_id'])) {
      $this->member_id = $_SESSION['member_id'];
    }
  }
}
