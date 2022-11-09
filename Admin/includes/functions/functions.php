<?php
/*
	** Get All Function v1.0
	** Function To Get All Records From Any Database Table
*/
/*
	** Title Function v1.0
	** Title Function That Echo The Page Title In Case The Page
	** Has The Variable $pageTitle And Echo Defult Title For Other Pages
*/
function getTitle(){

    global $pageTitle;

    if (isset($pageTitle)){
        echo $pageTitle;
    }else{
        echo 'UnFound title';
    }
}
/*
	** Home Redirect Function v2.0
	** This Function Accept Parameters
	** $theMsg = Echo The Message [ Error | Success | Warning ]
	** $url = The Link You Want To Redirect To
	** $seconds = Seconds Before Redirecting
*/
function redirectHome($errorMsg,$seconds = 3){
    echo '<div class="alert alert-danger">$errorMsg.</div>';
    echo '<div class="alert alert-info">You will be redirected to Home page After $seconds seconds.</div>';
    header("refresh:$seconds;url=auth/dashboard.php ");
    exit();
}


/*
	** Check Items Function v1.0
	** Function to Check Item In Database [ Function Accept Parameters ]
	** $select = The Item To Select [ Example: user, item, category ]
	** $from = The Table To Select From [ Example: users, items, categories ]
	** $value = The Value Of Select [ Example: Osama, Box, Electronics ]
*/

function CheckItems($select,$from,$value){
    global $con;
    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ? ");
    $statement->execute(array($value));
    $count = $statement->rowCount();
    return $count;
}

/*
	** Count Number Of Items Function v1.0
	** Function To Count Number Of Items Rows
	** $item = The Item To Count
	** $table = The Table To Choose From
*/



/*
	** Get Latest Records Function v1.0
	** Function To Get Latest Items From Database [ Users, Items, Comments ]
	** $select = Field To Select
	** $table = The Table To Choose From
	** $order = The Desc Ordering
	** $limit = Number Of Records To Get
*/




