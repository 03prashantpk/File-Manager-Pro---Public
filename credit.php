

<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');
header('Content-Type: text/javascript');

$website_name = $_POST['name'];

if($website_name == "DANL_GROUP" || $website_name == "xyz"){

    echo "Designed and Developed with ❤ by <a href='https://enally.in' target='_blank'>enally.in</a>";
}
else if ($website_name == "Alloys") {
    echo "Developed with ❤ by <a href='https://enally.in' target='_blank'>enally.in</a>";
}

?>

<style>
    #credit{
        padding: 10px 0px;
        -webkit-animation: blink-button 1s infinite alternate;
        animation: blink-button 1s infinite alternate;
        @keyframes blink-button {
            0% {
                opacity: 0.9;
            }
            50% {
                opacity: 0.6;
            }
            100% {
                opacity: 1;
            }
        }
    }
</style>

<script>
console.clear();
var space = "\n"
console.log(space, space, space);
console.log("=======================================================================");
console.log('%c This area is meant for developers and you are not suppose to be here. \n If there is any issue contact admin or the developer. \n https://enally.in ', 'color: red; background: yellow; font-size: 14px');
console.log("=======================================================================");
console.log(space, space, space)
</script>



