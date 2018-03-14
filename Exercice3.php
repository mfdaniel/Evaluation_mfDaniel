<?php
//  connect a Datebase

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $title = $_POST['title'] ?? null;
    $actors = $_POST['actors'] ?? null;
    $director = $_POST['director'] ?? null;
    $producer = $_POST['producer'] ?? null;
    $prodYear = $_POST['prodYear'] ?? null;
    $movieLanguage = $_POST['movieLanguage'] ?? null;
    $category = $_POST['category'] ?? null;
    $storyline = $_POST['storyline'] ?? null;
    $video = $_POST['video'] ?? null;
    
   
    
    // verify if title, actor-name, director-name, producer-name and storyline have more the 5 characters
    $titleSuccess = (is_string($title) && strlen($title) > 5);
    $actorsSuccess = (is_string($actors) && strlen($actors) > 5);
    $directorSuccess = (is_string($director) && strlen($director) > 5);
    $producerSuccess = (is_string($producer) && strlen($producer) > 5);
    $storylineSuccess = (is_string($storyline) && strlen($storyline) > 5);
    
    
    if($titleSuccess && $actorsSuccess && $directorSuccess && $producerSuccess && $storylineSuccess){
        try{
            $connection = new PDO('mysql:host=localhost;dbname=exercise_3','root');
        } catch (PDOException $e) {
            echo 'ERROR';
        }
        
        $statement = "INSERT INTO exercise_3.movies(title,actors,director,producer,prodYear,movieLanguage,category,storyline,video)
                     VALUES( :title,:actors, :director ,:producer ,:prodYear ,:movieLanguage ,:category , :storyline,:video)";
                      echo 'Data stored';
                      $statement = $connection->prepare($statement);
        $statement->bindValue('title',$title, PDO::PARAM_STR);
        $statement->bindValue('actors',$actors, PDO::PARAM_STR);
        $statement->bindValue('director',$director, PDO::PARAM_STR);
        $statement->bindValue('producer',$producer, PDO::PARAM_STR);
        $statement->bindValue('prodYear',$prodYear, PDO::PARAM_INT);
        $statement->bindValue('movieLanguage',$movieLanguage, PDO::PARAM_STR);
        $statement->bindValue('category',$category, PDO::PARAM_STR);
        $statement->bindValue('storyline',$storyline, PDO::PARAM_STR);
        $statement->bindValue('video',$video, PDO::PARAM_STR);
        if(!$statement->execute()){
            print_r($statement->errorInfo());
            echo "INSERT FAILED";

        }
    }    

}

?>
<!DOCTYPE html>
<head> 
	<meta charset="UTF-8" >
        <title>Exercise 3</title>
</head>
<body>
	<form action="/Exercice3.php" method="POST">
	
		<label>title</label>
    		 <?php
    		 if (! ($titleSuccess ?? true)) {
             ?>
                <div>
                	<p style="color:red" >Too short, please use at least 5 characters</p>
                </div>
           	 <?php
               }
              ?>
        
		<input type="text" name="title" placeholder="title"/> 
		
		<br/>
	
		<label>actors</label>
    		 <?php
    		 if (! ($actorsSuccess ?? true)) {
             ?>
                <div>
                	<p style="color:red" >Too short, please use at least 5 characters</p>
                </div>
           	 <?php
               }
              ?>
        
		<input type="text" name="actors" placeholder="actors"/> 
		
		<br/>
			
		<label>director</label>	
    		 <?php
    		 if (! ($directorSuccess ?? true)) {
             ?>
                <div>
                	<p style="color:red" >Too short, please use at least 5 characters</p>
                </div>
           	 <?php
               }
              ?>
		<input type="text" name="director" placeholder="director"/>
		
		<br/>
			
		<label>producer</label>
			 <?php
			 if (! ($producerSuccess ?? true)) {
             ?>
                <div>
                	<p style="color:red" >Too short, please use at least 5 characters</p>
                </div>
           	 <?php
               }
              ?>
		<input type="text" name="producer" placeholder="producer"/>
		
		<br/>
			
		<label>prodYear</label>
		<select name="category">
              <option>2018</option>
              <option>2017</option>
              <option>2016</option>
        </select>	
        
        <br/>
        		
		<label>movieLanguage</label>	
		<select name="category">
              <option>French</option>
              <option>English</option>
              <option>German</option>
        </select>
        
        <br/>
			
		<label>category</label>
		<select name="category">
              <option>Romance</option>
              <option>Comedy</option>
              <option>Drama</option>
        </select>
        
        <br/>
			
		<label>storyline</label>
			 <?php
			 if (! ($storylineSuccess ?? true)) {
             ?>
                <div>
                	<p style="color:red" >Too short, please use at least 5 characters</p>
                </div>
           	 <?php
               }
              ?>
		<input type="text" name="storyline" placeholder="storyline"/>
		
		<br/>
			
		<label>video</label>
		 <?php
		 $video = $_POST['video'] ?? null;
		 if (filter_var($video, FILTER_VALIDATE_URL) === false &&  !empty($video) ) {
		 ?>
			 <div>
                <p style="color:red" >Enter a valid URL </p>
             </div>
		 <?php
           }
          ?>
		<input type="text" name="video" placeholder="video"/>
		
		<br/>
					
		<button type="submit">Submit</button>
	</form>
</body>

<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
        try{
            $connection = new PDO('mysql:host=localhost;dbname=exercise_3','root');
        } catch (PDOException $exception) {
            echo 'ERROR';
        }
        
        $sql = "SELECT * FROM movies";
        $statement = $connection->prepare($sql);
        if(!$statement->execute()){
            echo "INSERT FAILED";
            return;
        }
        $returnData = $statement->fetchAll();
        foreach($returnData as $value){
            echo '<br/>';
            
            echo "Title: " . $value["title"];
            
            echo '<br/>';
            
            echo "Director: " .$value["director"];
            
            echo '<br/>';
            
            echo "Year of production: " .$value["prodYear"] ;           

        }
}
?>
