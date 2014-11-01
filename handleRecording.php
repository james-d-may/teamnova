<?php
 
    // Tell the caller their message has been recorded
	// Ask the caller if they want to re-record their message
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Gather numDigits="1" action="handleReRecordKey.php" method="POST">
    		    <Say>Thanks for your message. If you'd like to re-record your message then please press 9, otherwise goodbye and have a nice day.</Say>
    </Gather>
</Response>