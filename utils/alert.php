<?php
function showAlert($title, $text, $icon)
{
  echo "
  <script>
    Swal.fire({
      title: '$title',
      text: '$text',
      icon: '$icon'
    )}
  </script>
  ";
}