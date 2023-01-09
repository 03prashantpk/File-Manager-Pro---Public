<?php include("head.php") ?>
<?php
//Start the list

for ($index = 0; $index < $count; $index++) {
    $ext = pathinfo($dirArray[$index], PATHINFO_EXTENSION);

    if ($dirArray[$index] != '.' && $dirArray[$index] != '..' && $ext != "xml") {

        include("../../file_checker.php");

        if ($_SESSION['UserData']['Username'] == 'prashant' || $_SESSION['UserData']['Username'] == 'superuser') {
            $deleteopt = '  <a  class="delete" data-id="gallery/' . $dirArray[$index] . '"><i class="lni lni-trash-can"></i></a> ';
        } else {
            //$deleteopt = '<span class="tooltip">Info <i class="fa fa-info-circle" aria-hidden="true"></i><span class="tooltiptext">Login in As Superuser for more options</span></span>';
        }

        $dcount = @file_get_contents('assets/count/' . $dirArray[$index] . '.txt');
        $data_type = "mb";
        $filedate = date("d F Y", filemtime("gallery/$dirArray[$index]"));
        $filesize = number_format(filesize("gallery/$dirArray[$index]") / 1000000, 2);
        $images = rand(1,3);
        if($images == 1){
            $imgUrl = "https://newline-interactive.com/wp-content/uploads/2019/10/broadcast_gif2.gif";
        }
        else if($images == 2){
            $imgUrl = "https://i.pinimg.com/originals/a3/84/3e/a3843e404a271edb47b1908dd2a6230b.gif";
        }
        else{
            $imgUrl = "https://i.pinimg.com/originals/cf/94/7b/cf947b46283c10c47e3d5d945afb7053.gif";
        }
        printf('
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img style="padding: 5px;" src=" '.$imgUrl.'" class="img-fluid rounded-start" alt="Project Thumb">
                            </div>
                            <div class="col-md-8" style="padding: 0px;">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-transform: capitalize">' . $dirArray[$index] . '</h5>
                                    <p style="padding: 0px; line-height: 0;">File type: ' . $min . '</p>
                                    <p style="padding: 0px; line-height: 0;" class="card-text"><small class="text-muted">Last updated ' . $filedate . '</small></p>
                                    <p style="padding: 0px; line-height: 0.5; text-align: right;
                                    background-color: #F5AC00;
                                    width: 140px;
                                    padding: 4px 2px;
                                    color: #fff;
                                    border-radius: 8px;
                                    font-size: 17px;
                                    text-align: center;
                                    text-decoration: none;
                                    box-shadow:
                                        0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                                        0 6.7px 5.3px rgba(0, 0, 0, 0.048),
                                        0 12.5px 10px rgba(0, 0, 0, 0.06),
                                        0 22.3px 17.9px rgba(0, 0, 0, 0.072),
                                        0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                                        0 100px 80px rgba(0, 0, 0, 0.12); class="card-text"><a href="gallery/' . $dirArray[$index] . '" class="count" download data-id="' . $dirArray[$index] . '"  "><i class="lni lni-download"></i> Download</a></p>
                                    <p style="padding: 0px; line-height: 0.5;" >Total Download: ' . $dcount . ' <span style="float: right;">' . @$deleteopt . '</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ');
    }
}
if ($count <= 2) {
    $Notfound = '<p style="text-align: center; color:crimson;">No File Found</p>';
}
?>
<br>
<?php echo @$Notfound; ?>