<?php include("head.php") ?>
<div class="table-responsive mt-3">
    <table class="table table-striped table-hover table-sm mb-0">
        <thead>
            <tr>
                <th>Name <i class="bx bx-up-arrow-alt ms-2"></i>
                </th>
                <th>Size</th>
                <th>Last Modified</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
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

                    printf('<tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div> ' . $min . ' 
                                    </div>
                                    <div class="font-weight-bold text-danger">  ' . $dirArray[$index] . '
                                    </div>
                                </div>
                            </td>
                            <td>' . $filesize . $data_type . '</td>
                            <td><span class="date">' . $filedate . '</span></td>
                            <td><a href="gallery/' . $dirArray[$index] . '" class="count" download data-id="' . $dirArray[$index] . '"  "><i class="lni lni-download"></i></a> <span class="f-left">' . $dcount . ' downloads</span> </td>
                            <td>
                                ' . @$deleteopt . '
                            </td>
                            
                    </tr>');
                }
            }
            if ($count <= 2) {
                $Notfound = '<p style="text-align: center; color:crimson;">No File Found</p>';
            }
            ?>

        </tbody>

    </table>
    <br>
    <?php echo @$Notfound; ?>
</div>