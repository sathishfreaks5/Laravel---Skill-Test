<?php namespace App\Http;


class Flash {

  /**
   * Create flash message.
   *
   * @param $title    title of the message alert
   * @param $message  text of the message
   * @param $level    type of message
   * @param $key      type of alert box
   *
   * @return App\Http\Flash
   */
  public function create($title, $message, $level, $key = 'flash_message')
  {
    return session()->flash($key, [
      'title' => $title,
      'message' => $message,
      'level' => $level,
    ]); 
  }

  /**
   * Output a info flash message.
   *
   * @param $title    title of the message alert
   * @param $message  text of the message
   * @return void   */
  public function info($title, $message)
  {
    return $this->create($title, $message, 'info');
  }

  /**
   * Output a success flash message.
   *
   * @param $title    title of the message alert
   * @param $message  text of the message
   * @return void
   */
  public function success($title, $message)
  {
    return $this->create($title, $message, 'success');
  }

  /**
   * Output an error flash message.
   *
   * @param $title    title of the message alert
   * @param $message  text of the message
   * @return void
   */
  public function error($title, $message)
  {
    return $this->create($title, $message, 'error');
  }

  /**
   * Output confirmation message
   *
   * @param $title    title of the message alert
   * @param $message  text of the message
   * @return void
   */
  public function overlay($title, $message, $level = 'success')
  {
    return $this->create($title, $message, $level, 'flash_message_overlay');
  }

}

