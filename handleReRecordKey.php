<?php
 
    // Tell the caller their message has been recorded
	// Ask the caller if they want to re-record their message
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    // if the caller pressed anything but 1 send them back
    if($_REQUEST['Digits'] != '9') {
        header("Location: handleRecording.php");
        die;
    } 

?>

<?php if ($_REQUEST['Digits'] == '9') { ?>

	<Record maxLength="10" action="handleRecording.php" />

<?php } ?>