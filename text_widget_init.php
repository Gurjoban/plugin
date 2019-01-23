<?php
/*
Plugin Name: Footer Text Widget
Plugin URI: #
Description: Footer Text Widget plugin use to put multiple text values in single widget area.
Version: 1.0
Author: Demo
Author URI: #
License: GPL2 
*/

class footerTextWidget extends WP_Widget
{
    public function __construct() {
        parent::__construct("footer_text_widget", "Footer Text Widget",
            array("description" => "To use multiple pre-define text area."));
    }

    public function form($instance) {
        $title = "";
        $text = "";
        $msg = "";

        if (!empty($instance)) {
            $title = $instance["title"];
            $text = $instance["text"];
            $msg  = $instance["msg"];
        }

        $fieldId = $this->get_field_id("title");
        $fieldName = $this->get_field_name("title");
        echo "<p>";
        echo '<label for="' . $fieldId . '">Title:</label><br/>';
        echo '<input class="widefat" id="' . $fieldId . '" type="text" name="' .
            $fieldName . '" value="' . $title . '"/><br/>';
        echo "</p>";

        $textId = $this->get_field_id("text");
        $textName = $this->get_field_name("text");
        echo "<p>";
        echo '<label for="' . $textId . '">Text:</label><br/>';
        echo '<textarea class="widefat" id="' . $textId . '" name="' . $textName .
            '">' . $text . '</textarea>';
        echo "</p>";


      $msgId = $this->get_field_id("msg");
        $msgName = $this->get_field_name("msg");
        echo "<p>";
        echo '<label for="' . $msgId . '">Message:</label><br/>';
        echo '<textarea class="widefat" id="' . $msgId . '" name="' . $msgName .
            '">' . $msg. '</textarea>';
        echo "</p>";
  		    
    }

    public function update($newInstance, $oldInstance) {
        $values = array();
        $values["title"] = htmlentities($newInstance["title"]);
        $values["text"] = htmlentities($newInstance["text"]);
        $values["msg"] = htmlentities($newInstance["msg"]);
        return $values;
    }

    public function widget($args, $instance) {
        $title = $instance["title"];
        $text = $instance["text"];
        $msg = $instance["msg"];

        echo "<h2 class='widget-title'>$title</h2>";
        echo "<p>$text</p>";
        echo "<p>$msg</p>";
    }
}


/* ------ Widget Init --------- */
add_action("widgets_init",
    function () { register_widget("footerTextWidget"); });
