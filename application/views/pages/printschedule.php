<?php
$userid=$_SESSION['userid'];
$childid=$_SESSION['childid']

?>


<center><p><b>Common Vaccine Information</b></p> </center>
<p><b>First Name: </b><?php echo $childDetails['cfname']; ?></p>
<p><b>Last Name: </b><?php echo $childDetails['clname'];?></p>
<p><b>Date of Birth: </b><?php echo $childDetails['dob']; ?></p>
<p><b>Sex: </b><?php echo $childDetails['sex'];?></p>

  
  
  
 <center><p><b>Common Vaccine Information</b></p> </center>
  <div class="container">
    <div class="">

      <p></p>



              <table class="table table-striped table-bordered table-list">
                <thead>
                  <tr>

                    <th>Vaccine</th>
                   
                    <th>Dosage month</th>
                    <th>Symptom1</th>
                    <th>Symptom2</th>
                    <th>Symptom3</th>
					
                  </tr> 
                </thead>
                <tbody>

<?php 
				foreach($intVaccines as $row):

					?>
               <tr>
                   <td><?php echo $row['vaccinename']; ?></td>
                   <td><?php echo $row['dosagedate'];?></td>
                   <td><?php echo $row['symptom1'];?></td>
                   <td><?php echo $row['symptom2'];?></td>
				   <td><?php echo $row['symptom3'];?></td>
                 </tr>
<?php 
				endforeach;?>             
           
 
</tbody>
</table>

</div>
</div>
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->


  
  
  
  
 <center><p><b>External Vaccine Information</b></p> </center>
  <div class="container">
    <div class="">

      <p></p>



              <table class="table table-striped table-bordered table-list">
                <thead>
                  <tr>

                    <th>Vaccine</th>
                   
                    <th>Dosage month</th>
                    <th>Symptom1</th>
                    <th>Symptom2</th>
                    <th>Symptom3</th>
					
                  </tr> 
                </thead>
                <tbody>
<?php 
				foreach($extVaccines as $row):

					?>
                 <tr>
                   <td><?php echo $row['evaccname']; ?></td>
				   
                   <td><?php echo $row['dosagedate'];?></td>
                   <td><?php echo $row['symptom1'];?></td>
                   <td><?php echo $row['symptom2'];?></td>
				   <td><?php echo $row['symptom3'];?></td>
                 </tr>
                
<?php 
				endforeach;?>             
           
 
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