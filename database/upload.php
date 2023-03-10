<?php
require_once 'koneksi.php';
require_once '../auth.php'; 
if (isset($_POST['btn-submit'])) {
    $filePB = $_FILES['input-proposal-bisnis'];
    $fileCF = $_FILES['input-cash-flow'];

    $projek_kerjasama = $_POST['textarea-rencana-kerjasama'];

    $filePBName = $_FILES['input-proposal-bisnis']['name'];
    $filePBTmpName = $_FILES['input-proposal-bisnis']['tmp_name'];
    $filePBSize = $_FILES['input-proposal-bisnis']['size'];
    $filePBError = $_FILES['input-proposal-bisnis']['error'];
    $filePBType = $_FILES['input-proposal-bisnis']['type'];

    $fileCFName = $_FILES['input-cash-flow']['name'];
    $fileCFTmpName = $_FILES['input-cash-flow']['tmp_name'];
    $fileCFSize = $_FILES['input-cash-flow']['size'];
    $fileCFError = $_FILES['input-cash-flow']['error'];
    $fileCFType = $_FILES['input-cash-flow']['type'];

    $filePBExt = explode('.', $filePBName);
    $filePBActualExt = strtolower(end($filePBExt));
    
    $fileCFExt = explode('.', $fileCFName);
    $fileCFActualExt = strtolower(end($fileCFExt));

    $allowed = array('pdf');

    if (in_array($filePBActualExt, $allowed) && in_array($fileCFActualExt, $allowed)) {
        if ($filePBError == 0 && $fileCFError == 0) {
            if ($filePBSize <= 10000000 && $fileCFSize <= 10000000) {
                $filePBNewName = uniqid('', true).".".$filePBActualExt;
                $fileCFNewName = uniqid('', true).".".$fileCFActualExt;

                $filePBDestination = 'file-pb/'.$filePBNewName;
                $fileCFDestination = 'file-cf/'.$fileCFNewName;

                $userid = $_SESSION["id_user"];

                $sql = "INSERT INTO `tb_userbisnisprofile`(`id_user`, `proposal_bisnis`, `cash_flow`, `pojek_kerjasama`) VALUES ($userid,'$filePBDestination','$fileCFDestination','$projek_kerjasama')"; 
                
                if (mysqli_query($conn, $sql)) {
                    header('Location: ../ui-file-uploader.php?uploadSuccess');
                } else {
                    header('Location: ../ui-file-uploader.php?uploadError');

                }

                move_uploaded_file($filePBTmpName, $filePBDestination);
                move_uploaded_file($fileCFTmpName, $fileCFDestination);
                

            }else{
                header('Location: ../ui-file-uploader.php?fileToBig');
            }
        }else{
            header('Location: ../ui-file-uploader.php?errorUploadingFile');
        }
    }else{
        header('Location: ../ui-file-uploader.php?errorUnsupportedFile');
    }
}
?>