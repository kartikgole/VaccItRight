<?php
$db = new mysqli("localhost","root","","vaccitright");
$userid=$this->session->userdata('userid');
if ( isset( $_POST['viewedit'] ) ) 
 {
	 $_SESSION['childid']=$_POST['dfchildid'];
	
 }

//$childid=$_SESSION['childid'];


?>

<div class="fright mr10">
<form class="form-horizontal" role="form" action="addnewschedule.php" method="post">
					
					</a>
					<input type="hidden" name="childid" class="form-control" value="<?php echo $this->session->userdata('childid'); ?>">
					<input data-toggle="modal" href="#deletemodal" data-scroll class="btn btn-danger" name="deletechild" value="Delete Schedule" readonly>
</form>
				</div><br><br><br>
				<hr>
				
				
				
<div class="modal fade" id="deletemodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Confirmation Message</b></h4>
        </div>
        <div class="modal-body">
		<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>index.php/Pages/deleteSchedule" method="post">
          <p>Are you sure to delete the schedule</p>
        
        </div>
        <div class="modal-footer">
		  <input type="submit" class="btn btn-danger" name="deletechild" value="Delete Schedule">
		  </form>
        </div>
      </div>
      
    </div>
  </div>				
  <div class="container">
    <div class="row">

      <p></p>


      <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">Create Schedule to add common Vaccines</h3>
              </div>

            </div>
          </div>
          <form id="loginform" class="form-horizontal" role="form">
            <div class="panel-body">
          
</div>
<center>
<div style="margin-top:10px" class="form-group">
  <!-- Button -->

    <div class="col-sm-12 controls">

      <a id="creates" class="btn btn-success" data-toggle="modal" href="#addvaccModal" data-scroll>Add vaccines</a>


   

    </div>

</div>
</center>

</form>
</div>

</div></div></div>   
<!---modal for add vaccine-->             
<div class="modal fade" id="addvaccModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Add Vaccine</b></h4>
        </div>
        <div class="modal-body">
         <form name="form1" method="post" action="<?php echo base_url();?>index.php/Pages/addIntVaccine">
<center>
<p>Use this form to add common vaccines</p>
      <table class="table table-striped table-bordered table-list">
        <tr>
          <td id="lefttd">Vaccine Name:</td>
           <td>
            <select name="vname" class="">
             <option value="DTaP" selected>DTap</option>
             <option value="HepA">HepA</option>
             <option value="HepB">HepB</option>
			 <option value="Hib">Hib</option>
			 <option value="IPV">IPV</option>
			 <option value="MMR">MMR</option>
			 <option value="PCV">PCV</option>
			 <option value="Rota">Rota</option>
			 <option value="VAR">VAR</option>
           </select>
         </td>
        </tr>
		</br>
        <tr>
          <td>Dosage Month:</td>
          <td><input type="date" name="dosagedate" required/></td>
        </tr>
		</br>
        <tr>
          <td>Symptom 1</td>
          <td><input type="text" name="symptom1" /></td>
        </tr>
        <tr>
          <td>Symptom 2</td>
          <td><input type="text" name="symptom2"/></td>
        </tr>
        <tr>
          <td>Symptom 3</td>
          <td><input type="text" name="symptom3"/></td>
        </tr>
       
       
       
      </table>
  
     
    
        <input type="submit" class="btn btn-success" name="addvaccine" value="ADD VACCINE INFORMATION"></td><br><br>
    
   
 
  </center>
</form>
		  
		 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  

  
  
  
  
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
					          
                    <th >Delete</th>
                    <th >Modify</th>
                  </tr> 
                </thead>
                <tbody>

<?php 
				foreach($intVaccines as $row):

					?>
               <tr>
                   <form method="post" action="<?php echo base_url();?>index.php/Pages/changeIntVaccines"" class="form-inline">
                   <td><input type="text" name="vaccinename" value="<?php echo $row['vaccinename']; ?>" readonly></td>
                   <td><input type="text" name="dosagedate" value="<?php echo $row['dosagedate'];?>" readonly></td>
                   <td><input type="text" name="symptom1" value="<?php echo $row['symptom1'];?>"></td>
                   <td><input type="text" name="symptom2" value="<?php echo $row['symptom2'];?>"></td>
				   <td><input type="text" name="symptom3" value="<?php echo $row['symptom3'];?>"></td>
				   <td><input type="submit" class="btn btn-danger" name="changevaccine" value="DELETE"></td>
           <td><input type="submit" class="btn btn-warning" name="changevaccine" value="MODIFY"></td>
				   </form>
                 </tr>
<?php 
				endforeach;?>            
           
 
</tbody>
</table>
<hr>

<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->
<!----------------------------------------------------------EXTERNAL VACCINE INFORMATION---------------------------------------------------->


  <div class="container">
    <div class="row">

      <p></p>


      <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">Create Schedule to Add External Vaccines</h3>
              </div>

            </div>
          </div>
          <form id="loginform" class="form-horizontal" role="form">
            <div class="panel-body">
          
</div>
<center>
<div style="margin-top:10px" class="form-group">
  <!-- Button -->

    <div class="col-sm-12 controls">

      <a id="creates" class="btn btn-primary" data-toggle="modal" href="#addevaccModal" data-scroll>Add vaccine</a>


   

    </div>

</div>
</center>

</form>
</div>

</div></div></div>   
<!---modal for add vaccine-->             
<div class="modal fade" id="addevaccModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Add External Vaccine</b></h4>
        </div>
        <div class="modal-body">
         <form name="form1" method="post" action="<?php echo base_url();?>index.php/Pages/addExtVaccine">
<center>
<p>Use this form to add external vaccines</p>
      <table class="table table-striped table-bordered table-list">
        <tr>
          <td id="lefttd">Vaccine Name:</td>
           
            <td><input type="text" name="evaccname" required/></td>
       
        </tr>
		</br>
		<tr>
          <td id="lefttd">Description:</td>
           
            <td><input type="text" name="evaccdesc" required/></td>
       
        </tr>
		</br>
        <tr>
          <td>Dosage Month:</td>
          <td><input type="date" name="edosagedate" required/></td>
        </tr>
		</br>
        <tr>
          <td>Symptom 1</td>
          <td><input type="text" name="esymptom1" /></td>
        </tr>
        <tr>
          <td>Symptom 2</td>
          <td><input type="text" name="esymptom2"/></td>
        </tr>
        <tr>
          <td>Symptom 3</td>
          <td><input type="text" name="esymptom3"/></td>
        </tr>
       
       
       
      </table>
  
     
    
        <input type="submit" class="btn btn-success" name="addevaccine" value="ADD VACCINE INFORMATION"></td><br><br>
    
   
 
  </center>
</form>
		  
		 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  

  
  
  
  
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
					          <th>Delete</th>
                    <th>Modify</th>
                  </tr> 
                </thead>
                <tbody> 

<?php 
				foreach($extVaccines as $row):

					?>
                 <tr>
                   <form method="post" action="<?php echo base_url();?>index.php/Pages/changeExtVaccines">
                   <td><input type="text" name="evaccinename" value="<?php echo $row['evaccname']; ?>" readonly></td>
				   
                   <td><input type="text" name="edosagedate" value="<?php echo $row['dosagedate'];?>" readonly></td>
                   <td><input type="text" name="esymptom1" value="<?php echo $row['symptom1'];?>"></td>
                   <td><input type="text" name="esymptom2" value="<?php echo $row['symptom2'];?>"></td>
				   <td><input type="text" name="esymptom3" value="<?php echo $row['symptom3'];?>"></td>
				   <td><input type="submit" class="btn btn-danger" name="changeevaccine" value="DELETE"></td>
           <td><input type="submit" class="btn btn-warning" name="changeevaccine" value="MODIFY"></td>
				   </form>
                 </tr>
                
<?php 
				endforeach;?>               
           
 
</tbody>
</table>



<!------------------------------------PRINT THE PAGE---------------------------------------------------------------->


 <form method="post" action="<?php echo base_url();?>index.php/Pages/printSchedule">
<center>
                                    <div class="col-sm-12 controls">
                                      <button class="btn btn-primary hidden-print" ><span class="glyphicon glyphicon-print" aria-hidden="true" ></span> Print</button>
                                     

                                    </div>
									</center>
                            
</form>





</body>
</html>