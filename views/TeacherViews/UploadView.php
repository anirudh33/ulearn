

<div id="registerdiv">

<form id="uploadform" method="post" action="index.php?method=uploadFile&controller=Teacher" class="register" 
enctype="multipart/form-data" novalidate="novalidate"> 
<h1>Upload Content</h1>
<p>
<label>Lesson No:*</label>
<input type="text" id="lesson_no" name="lesson_no" class="long" 
onfocus="if(this.value === 'Lesson no required') this.value = '';">
<br>
</p>
<p>
<label>Lesson Name:*</label> 
<input type="text" id="lesson_name" name="lesson_name" class="long" 
onfocus="if(this.value === 'Lesson name required') this.value = '';"><br></p>
<p>
<label>Select course: </label>

<select name="coursenamelist" class="long">
                            <?php
                            
                            foreach ($data as $key=>$value)
							{
									
                            ?>
                            
                            <option value="<?php echo $value["coursename"];?>"> 
                            <?php echo $value["coursename"];?> </option>

                            <?php
                            }
                            ?>
                           </select> <br/></p>

<p>
<label>Choose file:* </label><input type="file" name="upload[]" class="long"/><br/></p>
 <p><input type="submit" id="button" value="OK" class="button"/> </p>
 <!-- <input type="button" value="add more" onclick="show()"/> -->
 </form>
</div>

