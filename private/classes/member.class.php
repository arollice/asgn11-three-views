<?php

class Member extends DatabaseObject
{
  static protected $table_name = 'users';
  static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'user_level', 'hashed_password'];

  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $username;
  public $user_level;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;

  public function __construct($args = [])
  {
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->user_level = $args['user_level'] ?? 'm';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name()
  {
    return $this->first_name . " " . $this->last_name;
  }

  protected function set_hashed_password()
  {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password)
  {
    return password_verify($password, $this->hashed_password);
  }

  protected function create()
  {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update()
  {
    if (is_blank($this->password)) {
      $this->password_required = false;
    } else {
      $this->set_hashed_password();
    }
    return parent::update();
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->first_name)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name, ['min' => 2, 'max' => 100])) {
      $this->errors[] = "First name must be between 2 and 100 characters.";
    }

    if (is_blank($this->last_name)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name, ['min' => 2, 'max' => 100])) {
      $this->errors[] = "Last name must be between 2 and 100 characters.";
    }

    if (is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    }

    if (is_blank($this->username)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!has_length($this->username, ['min' => 2, 'max' => 100])) {
      $this->errors[] = "Username must be between 2 and 100 characters.";
    } elseif (!has_unique_username($this->username . $this->id ?? 0)) {
      $this->errors[] = "Username not allowed. Try another.";
    }

    if ($this->password_required) {
      if (is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      }
      if ($this->password !== $this->confirm_password) {
        $this->errors[] = "Passwords must match.";
      }
      if (!has_length($this->password, ['min' => 12])) {
        $this->errors[] = "Password must contain 12 or more characters.";
      }
      if (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password must include at least one uppercase letter.";
      }
      if (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must include at least one lowercase letter.";
      }
      if (!preg_match('/\d/', $this->password)) {
        $this->errors[] = "Password must include at least one number.";
      }
    }

    if (!in_array($this->user_level, ['a', 'm'])) {
      $this->errors[] = "User level must be 'a' (Admin) or 'm' (Member).";
    }

    return $this->errors;
  }


  function display_errors($errors = [])
  {
    $output = '';
    if (!empty($errors)) {
      $output .= "<div class=\"errors\">";
      $output .= "<ul>";
      foreach ($errors as $error) {
        $output .= "<li>" . h($error) . "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
  }

  static public function find_by_username($username)
  {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
}
