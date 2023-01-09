<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0) {
    $yes = $yes + 1;
}
if ($vote == 1) {
    $no = $no + 1;
}

//insert votes to txt file
$insertvote = $yes . "||" . $no;
$fp = fopen($filename, "w");
fputs($fp, $insertvote);
fclose($fp);
?>

<hr>
<h5>Thank You for your vote.</h5>
<table>
    <tr>
        <td>Yes:</td>
        <td><img src="https://i2.wp.com/css-tricks.com/wp-content/uploads/2018/05/blinds_reverse.gif?ssl=1" width='<?php echo (100 * round($yes / ($no + $yes), 2)); ?>' height='20'>
            <?php echo (100 * round($yes / ($no + $yes), 2)); ?>%
        </td>
    </tr>
    <tr>
        <td>No:</td>
        <td><img src="https://i2.wp.com/css-tricks.com/wp-content/uploads/2018/05/blinds_reverse.gif?ssl=1" width='<?php echo (100 * round($no / ($no + $yes), 2)); ?>' height='20'>
            <?php echo (100 * round($no / ($no + $yes), 2)); ?>%
        </td>
    </tr>
</table>