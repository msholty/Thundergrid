<?php 
        try {
            $posted_id = $_GET['unique_id'];
            
            $conn = new Mongo;
            $db = $conn->thundergallery;
            $grid = $db->getGridFS();
            $file = $grid->findOne(array('test' => $posted_id));
            echo $file->getBytes();
            exit;  
            $conn->close();
            }catch(MongoConnectionException $e){
                die('Error connecting to MongoDB server');
            }catch(MongoException $e){
                die('Error: ' . $e->getMessage());
            }
?>