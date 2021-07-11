<?php
    $id_lead = $_POST['id_lead'];
    shell_exec('sudo bash -c "kubectl delete deploy nginx-deployment-'.$id_lead.'" 2>&1 && sudo bash -c "kubectl delete svc nginx-service-loadbalancer-'.$id_lead.'" 2>&1');
    // echo shell_exec('sudo bash -c "kubectl apply -f /opt/lampp/htdocs/registrysaas/api-php/deployments/'.$id_lead.'/'.$id_lead.'-cronjob.yaml" 2>&1');
    //delete lead
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "infosytemdb";
    // Create connect
    $conn = new mysqli($servername, $username, $password, $db);
    $conn->set_charset("utf8");
    //Check connect
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //delete lead
    $sql = "DELETE FROM leads WHERE id_lead='".$id_lead."'";
    if ($conn->query($sql) === true) {//tạo được data cho leads mới thì trả về id, không tạo được thì gửi error
        echo 'success';
    } else {
        echo 'fail';
    }
    $conn->close();
?>