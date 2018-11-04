<!DOCTYPE html>
<html>
	<head>
		<title>Lab3</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php
        class AllInfo {
            static public $con;
            function __construct(  ){
                self::$con = Connection::get_instance()->dbh;
            }
            static public function getAllInfo(){
                $records = [];
                $res = self::$con->query("SELECT * FROM all_info");
                while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $records[] = $row;
                }
                return $records;
            }
        }

        require_once 'connection.php';
        $obj_select= new AllInfo();
        $res_select=$obj_select->getAllInfo();
        for ($i = 0; $i < count($res_select);$i++ ) {
            if($res_select[$i]['type'] == 'video'){
                $src = $res_select[$i]['src'];
                ?>
                <div class="collections-item-outer">
                    <div class="collection-item">
                        <video controls>
                            <source src="video/<?php echo"$src"?>" type="video/mp4">
                        </video>
                        <div class="collection-text">
	                        </div>
	                    </div>
	                </div>
            <?php
					}elseif( $res_select[$i]['type'] == 'image'){
                $src = $res_select[$i]['src'];
                ?>
                        <img src="image/<?php echo"$src"?>" alt="List picture" width="" height="">
                <?php
            }else {
                $src = $res_select[$i]['src'];
                ?>
                <audio controls>
                  <source src="" type="audio/ogg">
                  <source src="audio/<?php echo"$src"?>" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
            <?php  }

        }
        ?>

	</body>
</html>
