<?php

if ($ext == 'JPG' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
    $min = '<span class="iconify" data-icon="akar-icons:image"></span>';
} else if ($ext == 'mp4' || $ext == 'mkv' || $ext == '3gp') {
    $min = '<span class="iconify" data-icon="dashicons:format-video"></span>';
} else if ($ext == 'mp3' || $ext == 'ogg' || $ext == 'aac' || $ext == 'm4a' || $ext == 'wav') {
    $min = '<span class="iconify" data-icon="flat-color-icons:music" style="color: darkred;"></span>';
} else if ($ext == 'pptx' || $ext == 'ppt') {
    $min = '<span class="iconify" data-icon="vscode-icons:file-type-powerpoint" style="color: darkred;"></span>';
} else if ($ext == 'doc' || $ext == 'docx' || $ext == 'DOCX' || $ext == 'txt' || $ext == 'xlsx') {
    $min = '<span class="iconify" data-icon="bx:bxs-file-doc"></span>';
    $main_color = 'style="background-color: #ebd5fa;"';
    $imgs = ' ';
} else if ($ext == 'pdf') {
    $min = '<span class="iconify" data-icon="ant-design:file-pdf-filled" style="color: darkred;"></span>';
} else if ($ext == 'rar' || $ext == 'zip') {
    $min = '<span class="iconify" data-icon="ant-design:file-zip-filled" style="color: darkblue;"></span>';
} else if ($ext == 'apk') {
    $min = '<span class="iconify" data-icon="flat-color-icons:android-os"></span>';

} else if ($ext == 'exe') {
    $min = '<span class="iconify" data-icon="eos-icons:software"></span>';
}
 else {
    $min = '<span class="iconify" data-icon="akar-icons:file"></span> ';
}

?>