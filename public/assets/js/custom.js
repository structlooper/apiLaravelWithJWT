/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";
if (jQuery().summernote) {
    
    $(".summernote").summernote({
      dialogsInBody: true,
      maxWidth: 600,
      minHeight: 200,
      toolbar: [
        ["style", ["bold", "italic", "underline", "clear"]],
        ["font", ["strikethrough"]],
        ["para", ["paragraph"]]
      ]
    });
  }