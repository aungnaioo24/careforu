<?php
	echo password_hash("aaaa4444", PASSWORD_DEFAULT);

	if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        }

	session_destroy();
?>