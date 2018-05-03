
				
				
				
				
  <div class="container">
    <div class="row">

      <p></p>


      <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">Compare Vaccine Symptoms</h3>
              </div>
               
            </div>
          </div>
        
            <div class="panel-body">
         </br>
		 <form action="<?php echo base_url();?>index.php/Pages/compare" id="loginform" class="form-horizontal" role="form" method="post" >
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
				   
                    <input type="text" class="form-control" name="vname" placeholder="Search" >
                    <span class="input-group-addon">
                         <input type="submit" class="btn-danger" name="searchvaccine" value="SEARCH">
					
                    </span>
                </div>
            </div>
        </div>
	</div>
	</form>
</br>
</div>



</div>

</div></div></div>   
<!---modal for add vaccine-->             

</form>
		  
		 


  
  
  
  
 <center><p><b>Search Results</b></p> </center>
  <div class="container">
    <div class="">

      <p></p>



              <table class="table table-striped table-bordered table-list">
                <thead>
                  <tr>

                    <th>Vaccine</th>
                   
                    <th>Description</th>
                    <th>Compare</th>
                    
                  </tr> 
                </thead>
                <tbody>
<?php 

//this is from compare symp
if ( isset( $_POST['searchvaccine'] ) ) 
 {
	
          foreach($symptomdetails as $row):
?>                 <tr>
                   <form method="post" action="<?php echo base_url();?>index.php/Pages/compareSymptoms">
                   <td><input type="text" class="form-control" name="vaccinename" value="<?php echo $row['vaccinename']; ?>" readonly></td>
				   <td><input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>" readonly></td>
				   <input type="hidden" name="vaccineid" value="<?php echo $row['vaccineid']; ?>">
				   <td><center><input type="submit" class="btn btn-warning" name="comparevaccine" value="COMPARE"></center></td>
				
				   </form>
                 </tr>
                
<?php 
        endforeach;?>            
           

<?php
          foreach($symptomdetails1 as $rows):
?>                 <tr>
                   <form method="post" action="<?php echo base_url();?>index.php/Pages/compareeSymptoms">
                   <td><input type="text" class="form-control" name="vaccinename" value="<?php echo $rows['evaccname']; ?>" readonly></td>
				   <td><input type="text" class="form-control" name="description" value="<?php echo $rows['evaccdesc']; ?>" readonly></td>
				   <input type="hidden" name="vaccineid" value="<?php echo $rows['evaccid']; ?>">
				   <td><center><input type="submit" class="btn btn-warning" name="compareevaccine" value="COMPARE"></center></td>
				
				   </form>
                 </tr>
                
<?php 
        endforeach; ?>           
        <?php  }?>
 
            




		
           
 
</tbody>
</table>
</div>
</div>


<!-- displaying comparision results -->  
 <center><p><b>Comparision Results</b></p> </center>
  <div class="container">
    <div class="">

      <p></p>



              <table class="table table-striped table-bordered table-list">
                <thead>
                  <tr>

                    <th>Child Name</th>
                    <th>Vaccine</th>
                    <th>Symptom1</th>
                    <th>Symptom2</th>
                    <th>Symptom3</th>
                 
                    
                  </tr> 
                </thead>
                <tbody>
<?php 
if ( isset( $_POST['comparevaccine'] ) ) 
 {
	
 foreach($compareResults as $row):
	

              


?>                 <tr>
                 
                   <td><?php echo $row['cfname']; ?></td>
				   <td><?php echo $row['vaccinename']; ?></td>
				   <td><?php echo $row['symptom1']; ?></td>
				   <td><?php echo $row['symptom2']; ?></td>
				   <td><?php echo $row['symptom3']; ?></td>
				  
				
		
				   
				   
				   
				   
                 </tr>
                
<?php  endforeach; ?>
 <tr>
  <td><?php echo "Common Symptoms" ?></td>
				   <td><?php echo $vaccinename; ?></td>
<?php				   
//$query = "SELECT  V.vaccinename, A.symptom1 as symptom1, B.symptom1 as symptom2, C.symptom1 as symptom3 FROM vaccine V, vacc_child A,vacc_child B,vacc_child C  WHERE V.vaccinename='$vaccinename' and A.symptom1=B.symptom2 and B.symptom2=C.symptom3 and V.vaccineid=A.vid";
  foreach($commonResults as $row):?>

             <td><?php echo $row['symptom']; ?></td>
			
	
	 <?php  endforeach; ?>  
				   
                 </tr>
 
 <?php
 }
 ?>
<?php 
if ( isset( $_POST['compareevaccine'] ) ) 
 {
	
	
      
          foreach($compareResults as $row):
?>                 <tr>
                 
                   <td><?php echo $row['cfname']; ?></td>
				   <td><?php echo $row['vaccinename']; ?></td>
				   <td><?php echo $row['symptom1']; ?></td>
				   <td><?php echo $row['symptom2']; ?></td>
				   <td><?php echo $row['symptom3']; ?></td>				   
				   
                 </tr>
 <?php endforeach;?>              

 <tr>
  <td><?php echo "Common Symptoms" ?></td>
				   <td><?php echo $vaccinename; ?></td>
<?php				   

			
		foreach($commoneResults as $row):
?>
             <td><?php echo $row['symptom']; ?></td>
			
		<?php  endforeach; ?>
	   
				   
                 </tr>
 
 <?php
 }
 ?> 
            
 




		
           
 
</tbody>
</table>
</div>
</div>

<!------------------------------------PRINT THE PAGE---------------------------------------------------------------->



<center>
                                    <div class="col-sm-12 controls">
                                      <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                                     

                                    </div>
									</center>
                            






</body>
</html>