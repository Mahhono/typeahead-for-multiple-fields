<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/php/connBD.php'); 

    $request    = mysqli_real_escape_string($conn, $_POST["query"]); 
    $partner_id = intval(mysqli_real_escape_string($conn, $_POST["partner_id"])); 
    
    if ($partner_id == 0)
        $query = "
            SELECT user_id, user_name, user_login, partner_id FROM users WHERE user_login LIKE '%".$request."%' OR user_name LIKE '%".$request."%'
            LIMIT 30";
    else
         $query = "
            SELECT user_id, user_name, user_login, partner_id FROM users WHERE partner_id=".$partner_id." AND user_login LIKE '%".$request."%' OR user_name LIKE '%".$request."%'
            LIMIT 30";

    $result = mysqli_query($conn, $query);
    $return = array();
    
    if(mysqli_num_rows($result)) {
        
        while($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
    }
        
    $result->close();
    $conn->close();
    
    echo json_encode($return); 
?>


