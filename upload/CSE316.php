<?php
error_reporting(0);
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes

$file = new SplFileInfo($fileName);
$extension  = $file->getExtension();
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    //echo "ERROR: Please browse for a file before clicking the upload button.";
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> Please browse for a file before clicking the upload button.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    exit();
}
if($extension == 'pdf' || $extension == 'ppt' || $extension == 'docx' || $extension == 'pptx' || $extension == 'doc' || $extension == 'png' || $extension == 'jpg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'JPEG' || $extension == 'jpeg' || $extension == 'xlsx')
{
    if(move_uploaded_file($fileTmpLoc, "../gallery/CSE316/gallery/$fileName")){
      //echo "$fileName <br> <br>upload is complete";
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> '.$fileName.' <b>Uploaded</b>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
   else {
      //echo "move_uploaded_file function failed";
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Failed!</strong> '.$fileName.' <b>Not Uploaded</b>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>';
  }
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> Only PDF, PPTX, doc, docx, PPT, JPG, PNG and JPEG format are allowed.</b>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
}

