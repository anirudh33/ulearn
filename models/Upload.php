<?php
$n=count($_FILES['upload']['name']);
echo $n;
for($i=0;$i<$n;$i++)
{
if($_FILES['upload']['name'][$i])
{
    //if no errors...
    if(!$_FILES['upload']['error'][$i])
    {
        $newname = strtolower($_FILES['upload']['tmp_name'][$i]);
    
     
            $allowedExts = array("doc", "pdf", "jpg");
            $extension = end(explode(".", $_FILES['upload']['name'][$i]));
            if ((($_FILES['upload']['type'] == "/doc")
                    
                    || ($_FILES['upload']['type'] == "text/pdf")
                    || ($_FILES['upload']['type'] == "image/jpg")
                    )
                    && ($_FILES['upload']['size'] < 1024000)
                    || in_array($extension, $allowedExts))
            {
                
              $path="uploads/";
            $path=$path.basename( $_FILES['upload']['name'][$i]);
                
                if(move_uploaded_file($_FILES['upload']['tmp_name'][$i], $path.$_FILES['upload']['name'][$i])) {
                    
                    echo "The file ".  basename( $_FILES['upload']['name'][$i]).
                    " has been uploaded";
                    }
                    else {
                        echo "there";
                    }
            }
     }
    else
    {
        echo "not a valid file";
    }
}
}
?>
