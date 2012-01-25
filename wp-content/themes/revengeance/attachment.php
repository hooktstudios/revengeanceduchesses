<?php
the_post();
header('Location:'.wp_get_attachment_url(get_the_ID()));
?>