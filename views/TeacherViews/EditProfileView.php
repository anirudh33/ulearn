
		<div id="registerdiv">

			<form id="form"
				action="index.php?method=editTeacherClick&controller=Teacher"
				method="POST" class="register">

				<h1>Edit Profile</h1>

				
					<legend>Personal Details </legend>
					<p>
						<label>First Name * </label> <input type="text" id="firstname"
							name="firstname" class="long"
							value=<?php echo $data[0]['firstname']?>
							onfocus="if(this.value === 'Firstname required') this.value = '';">
					</p>
					<p>
						<label>Last Name * </label> <input type="text" id="lastname"
							name="lastname" class="long"
							value=<?php echo $data[0]['lastname']?>
							onfocus="if(this.value === 'Lastname required') this.value = '';">
					</p>
					<p>
						<label>Phone </label> <input type="text" id="phone" name="phone"
							maxlength="10" value=<?php echo $data[0]['phone']?>>

					</p>

					<p>
						<label>Address </label> <input type="text" id="address"
							name="address" class="long"
							value=<?php echo $data[0]['address']?>>

					</p>


					<p>
						<label>Qualification * </label> <input type="text"
							id="qualification" name="qualification" class="long"
							value=<?php echo $data[0]['qualification']?>
							onfocus="if(this.value === 'Qualification required') this.value = '';">
					</p>

				
				
					
					<p>
						<label>Gender </label> <input type="text" id="gender"
							name="gender" class="long" value=<?php echo $data[0]['gender']?>>

					</p>
					<p>
						<label>Birthdate * </label> <input type="text" id="dob" name="dob"
							class="long" value=<?php echo $data[0]['dob']?>
							onfocus="if(this.value === 'DOB required') this.value = '';">
					</p>

									
									
				
				
					<button class="button" id="edit">Edit &raquo;</button>
				
				
			</form>
			
		</div>




























